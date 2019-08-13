<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\User;
use App\Provider;
use App\Category;
use App\ActivityType;
use App\Review;
use App\Location;
use App\Settings;
use Auth;

class AdminController extends Controller
{
  public function __construct() 
  {

  }

  public function index() {
    return redirect()->route('admin.dashboard');
  }

  public function login(Request $request) {

    if ($request->isMethod('post')) {
      
      $validator = Validator::make($request->all(), [
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required', 'string', 'min:8'],
      ]);

      if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
      }

      $credentials = ['email' => $request->email, 'password' => $request->password, 'role' => 'admin'];

      if (Auth::attempt($credentials, $request->remember)) {
        return response()->json(['message' => 'Successfully logged in.'], 200);
      } else {
        return response()->json(['exist' => 'This admin does not exist.'], 400);
      }
    } else {
      return view('admin.login');
    }
  }

  public function logout(Request $request) {

    if ($request->isMethod('post')) {
      Auth::logout();
      if (!Auth::check()) {
        return redirect()->route('admin.login');
      }
    }

    return redirect()->back();
  }

  public function dashboard(Request $request) {
    $active_class = 'dashboard';
    return view('admin.dashboard', ['active_class' => $active_class]);
  }

  public function users(Request $request) {
    $active_class = 'users';
    $users = User::all();
    return view('admin.users', ['active_class' => $active_class, 'users' => $users]);
  }

  public function users_permission(Request $request) {
    if ($request->ajax()) {
      $user = User::find($request->user_id);
      $user->permission = $request->permission;
      $user->save();

      return response()->json(['message' => 'successfully changed.'], 200);
    }
  }

  public function providers(Request $request) {
    $active_class = 'providers';
    $providers = Provider::with(['users', 'categories', 'activityTypes'])->get();

    return view('admin.providers', ['active_class' => $active_class, 'providers' => $providers]);
  }

  public function providers_permission(Request $request) {
    if ($request->ajax()) {
      $provider = Provider::find($request->provider_id);
      $provider->permission = $request->permission;
      $provider->save();

      return response()->json(['message' => 'successfully changed.'], 200);
    }
  }

  public function providers_profile(Request $request, $id) {
    $active_class = 'providers';
    $ip = $request->ip();
    // $ip = '104.247.132.212';
    $ip = $ip == '127.0.0.1' ? '162.253.129.2' : $ip;

    $categories = Category::all();
    $activity_types = ActivityType::all();
    $locations = Location::all();
    $provider = Provider::find($id);

    return view('admin.provider-profile', ['ip' => $ip, 'active_class' => $active_class, 'categories' => $categories, 'activity_types' => $activity_types, 'locations' => $locations, 'provider' => $provider]);
  }

  public function reviews(Request $request) {
    $active_class = 'reviews';
    $reviews = Review::with(['providers', 'users'])->get();

    return view('admin.reviews', ['active_class' => $active_class, 'reviews' => $reviews]);
  }

  public function reviews_permission(Request $request) {
    if ($request->ajax()) {
      $review = Review::find($request->review_id);
      $review->permission = $request->permission;
      $review->save();

      return response()->json(['message' => 'successfully changed.'], 200);
    }
  }

  public function locations() {
    $active_class = 'locations';
    $locations = Location::all();

    return view('admin.locations', ['active_class' => $active_class, 'locations' => $locations]);
  }

  public function locations_add(Request $request) {
    $validator = Validator::make($request->all(), [
      'location_name' => ['required', 'string', 'max:30', 'unique:locations'],
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 400);
    }

    $location = new Location();
    $location->location_name = $request->location_name;
    $location->save();

    return response()->json(['message' => 'Successfully added.'], 200);
  }

  public function adwords() {
    $active_class = 'adwords';
    $adwords_skyscraper = Settings::where('key', 'adwords_skyscraper')->first();
    if (!$adwords_skyscraper) {
      $adwords_skyscraper = new Settings();
    }
    $adwords_square = Settings::where('key', 'adwords_square')->first();
    if (!$adwords_square) {
      $adwords_square = new Settings();
    }

    return view('admin.adwords', ['active_class' => $active_class, 'adwords_skyscraper' => $adwords_skyscraper, 'adwords_square' => $adwords_square]);
  }

  public function adwords_save(Request $request) {
    $validator = Validator::make($request->all(), [

    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 400);
    }

    $adwords_skyscraper = Settings::where('key', 'adwords_skyscraper')->first();
    if ($adwords_skyscraper) {
      $adwords_skyscraper->value = $request->adwords_skyscraper ? $request->adwords_skyscraper : '';
      $adwords_skyscraper->save();
    } else {
      Settings::create(['key' => 'adwords_skyscraper', 'value' => $request->adwords_skyscraper ? $request->adwords_skyscraper : '']);
    }
    $adwords_square = Settings::where('key', 'adwords_square')->first();
    if ($adwords_square) {
      $adwords_square->value = $request->adwords_square ? $request->adwords_square : '';
      $adwords_square->save();
    } else {
      Settings::create(['key' => 'adwords_square', 'value' => $request->adwords_square ? $request->adwords_square : '']);
    }

    return response()->json(['message' => 'Successfully saved.'], 200);
  }
}
