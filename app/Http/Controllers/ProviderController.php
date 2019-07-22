<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Provider;
use App\Category;
use App\ActivityType;

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
    if ($request->ajax()) {
      $category_id = $request->category;
      $results['activities'] = Provider::with('activityTypes')->where('category', '=', $category_id)->get();

      $results['categories'] = $categories;
      $results['activity_types'] = $activity_types;
      return response()->json($results, 200);

    } else {

      $activities = Provider::all();

      return view('activities.index', ['activities' => $activities, 'categories' => $categories, 'activity_types' => $activity_types]);

    }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
    $categories = Category::all();
    $activity_types = ActivityType::all();
    $provider = Provider::find(Auth::user()->id);
    if (!$provider) {
      $provider = new Provider();
    }
    
    return view('providers.create', ['provider' => $provider, 'categories' => $categories, 'activity_types' => $activity_types]);
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

    if ($request->file('banner_img')) {

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

    } else {

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
      $provider->activity_type = $request->input('activity_type') ? $request->input('activity_type') : $provider->activity_type;
      $provider->location = $request->input('location') ? $request->input('location') : $provider->location;
      $provider->category = $request->input('category') ? $request->input('category') : $provider->category;
      $provider->distance = $request->input('distance') ? $request->input('distance') : $provider->distance;
      $provider->address = $request->input('address') ? $request->input('address') : $provider->address;
      $provider->state = $request->input('state') ? $request->input('state') : $provider->state;
      $provider->city = $request->input('city') ? $request->input('city') : $provider->city;
      $provider->zip_code = $request->input('zip_code') ? $request->input('zip_code') : $provider->zip_code;
      $provider->phone_number = $request->input('phone_number') ? $request->input('phone_number') : $provider->phone_number;
      $provider->website = $request->input('website') ? $request->input('website') : $provider->website;
      $provider->age_min = $request->input('age_min') ? $request->input('age_min') : $provider->age_min;
      $provider->age_max = $request->input('age_max') ? $request->input('age_max') : $provider->age_max;
      $provider->activity_description = $request->input('activity_description') ? $request->input('activity_description') : $provider->activity_description;
      $provider->social_media_links = $request->input('social_media_links') ? $request->input('social_media_links') : $provider->social_media_links;
      $provider->thumbnail_img = $request->file('thumbnail_img') ? Storage::url($request->file('thumbnail_img')->store($thumbnail_dir)) : $provider->thumbnail_img;
      $provider->profile_img = $request->file('profile_img') ? Storage::url($request->file('profile_img')->store($profile_dir)) : $provider->profile_img;
      $provider->business_hours = $request->input('business_hours') ? $request->input('business_hours') : $provider->business_hours;
      $provider->slug = $request->input('slug') ? $request->input('slug') : $provider->slug;
      
      $provider->save();
    }

    return redirect()->back();
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
    $activity = Provider::find($id);
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
}
