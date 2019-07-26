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
    $ip = '162.253.129.2';
    $location_list = getCityListFromIP($ip);

    if ($request->ajax()) {

      $activities_query = Provider::with('activityTypes');
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
      if ($request->age7 == 'true') { 
        $activities_query->where('age_range', 'like', '%age7%');
      }
      if ($request->age8 == 'true') { 
        $activities_query->where('age_range', 'like', '%age8%');
      }
        
      $results['activities'] = $activities_query->get();
      $results['categories'] = $categories;
      $results['activity_types'] = ActivityType::where('category_id', '=', $request->category)->get();

      return response()->json($results, 200);
    } else {

      $activities = Provider::all();

      return view('activities.index', ['activities' => $activities, 'categories' => $categories, 'activity_types' => $activity_types, 'location_list' => $location_list]);
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
    $ip = '162.253.129.2';

    $categories = Category::all();
    $activity_types = ActivityType::all();
    $provider = Provider::find(Auth::user()->id);
    if (!$provider) {
      $provider = new Provider();
    }
    
    return view('providers.create', ['provider' => $provider, 'categories' => $categories, 'activity_types' => $activity_types, 'ip' => $ip]);
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
    $banner_dir = 'public/providers/' . Auth::user()->id . '/banners';
    $thumbnail_dir = 'public/providers/' . Auth::user()->id . '/thumbnails';
    $profile_dir = 'public/providers/' . Auth::user()->id . '/profiles';

    if ($request->ajax()) {

      // $validator = Validator::make($request->all(), [
      //   'business_name' => ['required', 'string', 'max:255'],
      //   'category' => ['required'],
      //   'activity_type' => ['required'],
      //   'location' => ['required'],
      //   'address' => ['required', 'string'],
      //   'state' => ['required', 'string'],
      //   'city' => ['required', 'string'],
      //   'zip_code' => ['required'],
      //   'phone_number' => ['required'],
      //   'website' => ['required'],
      //   'age_min' => ['required'],
      //   'age_max' => ['required'],
      //   'activity_description' => ['required'],
      //   'thumbnail_img' => ['required', 'mimes:jpeg,bmp,png'],
      //   'profile_img' => ['required', 'mimes:jpeg,bmp,png'],
      // ]);
      // // dd($validator->errors()->messages()['business_name']);
      // if ($validator->fails()) {
      //   return redirect()->back()->with(['errors' => $validator->errors()]);
      // }

      $provider = Provider::find(Auth::user()->id);

      if ($provider) {

        if ($request->file('thumbnail_img') && $provider->thumbnail_img && Storage::exists($thumbnail_dir . '/' . basename($provider->thumbnail_img))) {
          Storage::delete($thumbnail_dir . '/' . basename($provider->thumbnail_img));
        }
        if ($request->file('profile_img') && $provider->profile_img && Storage::exists($profile_dir . '/' . basename($provider->profile_img))) {
          Storage::delete($profile_dir . '/' . basename($provider->profile_img));
        }
      } else {

        $provider = new Provider();
      }
      
      $provider->user_id = $request->input('user_id') ? $request->input('user_id') : $provider->user_id;
      $provider->business_name = $request->input('business_name') ? $request->input('business_name') : $provider->business_name;
      $provider->category = $request->input('category') ? $request->input('category') : $provider->category;
      $provider->activity_type = $request->input('activity_type') ? $request->input('activity_type') : $provider->activity_type;
      $provider->location = $request->input('location') ? $request->input('location') : $provider->location;
      $provider->distance = $request->input('distance') ? $request->input('distance') : $provider->distance;
      $provider->address = $request->input('address') ? $request->input('address') : $provider->address;
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

      return response()->json(['message' => 'Successfully saved!'], 200);
    }

    else if ($request->file('banner_img')) {

      $provider = Provider::find(Auth::user()->id);

      if ($provider && $provider->banner_img && Storage::exists($banner_dir . '/' . basename($provider->banner_img))) {
        Storage::delete($banner_dir . '/' . basename($provider->banner_img));
      }
      
      if (!$provider) {
        $provider = new Provider();
        $provider->user_id = Auth::user()->id;
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
  public function show($id)
  {
    //
    $activity = Provider::with('reviews')->find($id);
    if ($activity) {
      return view('activities.detail', ['activity' => $activity]);
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
    $provider = Provider::where('user_id', '=', Auth::user()->id)->first();
    $reviews = Review::where('provider_id', '=', $provider->id)->get();

    return view('providers.reviews', ['reviews' => $reviews]);
  }
}
