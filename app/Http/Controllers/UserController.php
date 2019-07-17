<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\User;
use Auth;

class UserController extends Controller
{
  //
  public function __construct() 
  {

  }

  public function edit() 
  {
    return view('profile.edit');
  }

  public function update(Request $request, $id) 
  {

    if ($request->file('avatar')) {

      $path = $request->file('avatar')->store('public/avatars/' . $id);
      $user = User::find($id);
      $user->avatar = Storage::url($path);
      $user->save();

      return redirect()->back();
      
    } else {

      $request->validate([
        'first_name' => 'required|max:25',
        'last_name' => 'required|max:25',
        'email' => 'required|email|max:50',
        'phone_number' => 'required|numeric|digits_between:7, 15',
        'is_provider' => 'required',
        'current_password' => 'required',
      ]);

      if ($request->password) {

        $request->validate([
          'password' => 'confirmed|min:8|different:current_password',
        ]);

      }

      $c_password = Auth::user()->password;

      if (Hash::check($request->current_password, $c_password)) {

        $user = User::find($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->password = $request->password ? Hash::make($request->password) : Auth::user()->password;
        $user->save();

        return redirect()->back();

      } else {

        $error = array('current_password' => 'Please enter correct current password');
        
        return redirect()->back()->withErrors($error);

      }
    }
  }
}
