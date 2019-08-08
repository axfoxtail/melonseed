<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Validator;
use App\Provider;
use App\Category;
use App\ActivityType;
use App\Booking;
use App\Review;
use App\Location;
use DB;

class ProviderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $categories = Category::all();
    $activity_types = ActivityType::all();
    $ip = $request->ip();
    // $ip = '104.247.132.212';
    $ip = ($ip == '127.0.0.1') ? '162.253.129.2' : $ip;
    // $location_list = getCityListFromIP($ip);
    $location_list = Location::all();

    if ($request->ajax()) {

      $activities_query = Provider::with('activityTypes');
        $activities_query->where('permission', '=', '1');
      if ($request->category) {
        $activities_query->where('category', '=', $request->category);
      }
      if ($request->activity_type) {
        $activities_query->where('activity_type', '=', $request->activity_type);
      }
      if ($request->location) {
        $activities_query->where('location', '=', $request->location);
      }
      if ($request->age1 == 'true') { 
        $activities_query->where('age_range', 'like', '%age1%');
      }
      if ($request->age2 == 'true') { 
        $activities_query->where('age_range', 'like', '%age2%');
      }
      if ($request->age3 == 'true') { 
        $activities_query->where('age_range', 'like', '%age3%');
      }
      if ($request->age4 == 'true') { 
        $activities_query->where('age_range', 'like', '%age4%');
      }
      if ($request->age5 == 'true') { 
        $activities_query->where('age_range', 'like', '%age5%');
      }
      if ($request->age6 == 'true') { 
        $activities_query->where('age_range', 'like', '%age6%');
      }
      // if ($request->age7 == 'true') { 
      //   $activities_query->where('age_range', 'like', '%age7%');
      // }
      // if ($request->age8 == 'true') { 
      //   $activities_query->where('age_range', 'like', '%age8%');
      // }
        
      $activities = $activities_query->get();
      $_activities = [];
      if ($request->distance && intval($request->distance) < 101) {
        foreach ($activities as $activity) {
          if ($activity->latitude && $activity->longitude && (distanceWithMyIP2ProviderPlace($ip, $activity->latitude, $activity->longitude, 'K', 2) <= intval($request->distance))) {
            $_activities.push($activity);
          }
        }
      } else {
        $_activities = $activities;
      }

      $results['my_location'] = (object) array(
        'ip' => $ip,
        'latitude' => getArrLocationFromIP($ip)->latitude, 
        'longitude' => getArrLocationFromIP($ip)->longitude
      );
      $results['activities'] = $_activities;
      $results['categories'] = $categories;
      if ($request->category) {
        $results['activity_types'] = ActivityType::where('category_id', '=', $request->category)->get();
      } else {
        $results['activity_types'] = $activity_types;
      }

      return response()->json($results, 200);
    } else {
      $my_location = (object) array(
        'ip' => $ip,
        'latitude' => getArrLocationFromIP($ip)->latitude, 
        'longitude' => getArrLocationFromIP($ip)->longitude
      );

      $activities = Provider::where('permission', '=', '1')->get();

      return view('activities.index', ['my_location' => $my_location, 'activities' => $activities, 'categories' => $categories, 'activity_types' => $activity_types, 'location_list' => $location_list]);
    }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
    $ip = $request->ip();
    // $ip = '104.247.132.212';
    // $ip = $ip == '127.0.0.1' ? '162.253.129.2' : $ip;

    $categories = Category::all();
    $activity_types = ActivityType::all();
    $locations = Location::all();
    $provider = Provider::find(Auth::user()->id);
    if (!$provider) {
      $provider = new Provider();
    }
    
    return view('providers.create', ['provider' => $provider, 'categories' => $categories, 'activity_types' => $activity_types, 'locations' => $locations, 'ip' => $ip]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
    $banner_dir = 'public/providers/' . $request->input('user_id') . '/banners';
    $thumbnail_dir = 'public/providers/' . $request->input('user_id') . '/thumbnails';
    $profile_dir = 'public/providers/' . $request->input('user_id') . '/profiles';

    if ($request->ajax()) {

      $provider = Provider::find($request->input('user_id'));

      if ($provider) {
        $validator = Validator::make($request->all(), [
          'business_name' => ['required', 'string', 'max:255'],
          'category' => ['required'],
          'activity_type' => ['required'],
          'location' => ['required'],
          'address' => ['required', 'string'],
          'phone_number' => ['required'],
          'website' => ['required'],
          'age_range' => ['required'],
          'activity_description' => ['required'],
        ]);

        if ($request->file('thumbnail_img') && $provider->thumbnail_img && Storage::exists($thumbnail_dir . '/' . basename($provider->thumbnail_img))) {
          Storage::delete($thumbnail_dir . '/' . basename($provider->thumbnail_img));
        }
        if ($request->file('profile_img') && $provider->profile_img && Storage::exists($profile_dir . '/' . basename($provider->profile_img))) {
          Storage::delete($profile_dir . '/' . basename($provider->profile_img));
        }
        $results['message'] = 'Successfully updated.';
      } else {
        $validator = Validator::make($request->all(), [
          'business_name' => ['required', 'string', 'max:255'],
          'category' => ['required'],
          'activity_type' => ['required'],
          'location' => ['required'],
          'address' => ['required', 'string'],
          'phone_number' => ['required'],
          'website' => ['required'],
          'age_range' => ['required'],
          'activity_description' => ['required'],
          'thumbnail_img' => ['required', 'mimes:jpeg,bmp,png'],
          'profile_img' => ['required', 'mimes:jpeg,bmp,png'],
        ]);

        $provider = new Provider();
        $results['message'] = 'Successfully saved.';
      }

      if ($validator->fails()) {
        $results['status'] = false;
        $results['errors'] = $validator->errors();
        return response()->json($results, 200);
      }

      $address = $request->input('address');
      if ($provider->address != $address) {
        $geo_location = getGeoLocationFromAddress($address);
        if (!$geo_location['status']) {
          return response()->json([], 400);
        }

        $provider->latitude = $geo_location['latitude'];
        $provider->longitude = $geo_location['longitude'];
        $provider->address = $request->input('address') ? $geo_location['address'] : $provider->address;
      }
      
      $provider->user_id = $request->input('user_id') ? $request->input('user_id') : $provider->user_id;
      $provider->business_name = $request->input('business_name') ? $request->input('business_name') : $provider->business_name;
      $provider->category = $request->input('category') ? $request->input('category') : $provider->category;
      $provider->activity_type = $request->input('activity_type') ? $request->input('activity_type') : $provider->activity_type;
      $provider->location = $request->input('location') ? $request->input('location') : $provider->location;
      $provider->distance = $request->input('distance') ? $request->input('distance') : $provider->distance;
      $provider->state = $request->input('state') ? $request->input('state') : $provider->state;
      $provider->city = $request->input('city') ? $request->input('city') : $provider->city;
      $provider->zip_code = $request->input('zip_code') ? $request->input('zip_code') : $provider->zip_code;
      $provider->phone_number = $request->input('phone_number') ? $request->input('phone_number') : $provider->phone_number;
      $provider->website = $request->input('website') ? $request->input('website') : $provider->website;
      $provider->age_range = $request->input('age_range') ? $request->input('age_range') : $provider->age_range;
      $provider->activity_description = $request->input('activity_description') ? $request->input('activity_description') : $provider->activity_description;
      $provider->social_media_links = $request->input('social_media_links') ? $request->input('social_media_links') : $provider->social_media_links;
      $provider->thumbnail_img = $request->file('thumbnail_img') ? Storage::url($request->file('thumbnail_img')->store($thumbnail_dir)) : $provider->thumbnail_img;
      $provider->profile_img = $request->file('profile_img') ? Storage::url($request->file('profile_img')->store($profile_dir)) : $provider->profile_img;
      $provider->business_hours = $request->input('business_hours') ? $request->input('business_hours') : $provider->business_hours;
      $provider->slug = $request->input('slug') ? $request->input('slug') : $provider->slug;
      
      $provider->save();
      
      $results['status'] = true;
      $results['formatted_address'] = $provider->address;

      return response()->json($results, 200);
    }

    else if ($request->file('banner_img')) {

      $provider = Provider::find($request->input('user_id'));

      if ($provider && $provider->banner_img && Storage::exists($banner_dir . '/' . basename($provider->banner_img))) {
        Storage::delete($banner_dir . '/' . basename($provider->banner_img));
      }
      
      if (!$provider) {
        $provider = new Provider();
        $provider->user_id = $request->input('user_id');
      }
      
      $provider->banner_img = Storage::url($request->file('banner_img')->store($banner_dir));
      
      $provider->save();

     return redirect()->back();

    } else {

     return redirect()->back();
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request, $id)
  {
    $ip = $request->ip();
    // $ip = '104.247.132.212';
    // $ip = $ip == '127.0.0.1' ? '162.253.129.2' : $ip;
    $my_location = getArrLocationFromIP($ip);
    $activity = Provider::with('reviews')->where('permission', '=', '1')->find($id);
    if ($activity) {
      if ($request->ajax()) {
        $results['my_location'] = $my_location;
        $results['activity'] = $activity;
        return response()->json($results, 200);
      } else {
        return view('activities.detail', ['my_location' => $my_location, 'activity' => $activity]);
      }
    } else {
      return redirect()->back();
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }

  public function featured(Request $request) {
    $providers = DB::table('providers')->limit(10)->get();

    return view('providers.index', ['providers' => $providers]);
  }

  public function enrolling(Request $request) {
    if ($request->ajax()) {
      $validator = Validator::make($request->all(), [
        'provider_id' => ['required'],
        'start_date' => ['required', 'date'],
        'end_date' => ['required', 'date'],
      ]);

      if ($validator->fails()) {
        return response()->json($validator->errors()->message(), 400);
      }

      $booking = new Booking();
      $booking->provider_id = $request->provider_id;
      $booking->parent_id = Auth::user()->id;
      $booking->start_date = $request->start_date;
      $booking->end_date = $request->end_date;
      $booking->status = '0';
      $booking->save();

      return response()->json(['message' => 'Successfully Booked.'], 200);
    } else {
      return 'Bad Gateway 404';
    }
  }

  public function reviews() {
    $provider = Provider::where('user_id', '=', Auth::user()->id)->where('permission', '=', '1')->first();
    if ($provider) {
      $reviews = Review::where('provider_id', '=', $provider->id)->where('permission', '=', '1')->get();
    } else {
      $reviews = [];
    }

    return view('providers.reviews', ['reviews' => $reviews]);
  }
}
