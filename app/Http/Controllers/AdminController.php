<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\User;
use Auth;

class AdminController extends Controller
{
  public function __construct() 
  {

  }

  public function index() {
    return view('admin.dashboard');
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
}
