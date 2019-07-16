<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    $request->validate([
      'first_name' => 'required|max:25',
      'last_name' => 'required|max:25',
      'username' => 'required|unique:users|max:25',
      'email' => 'required|email|max:50',
      'phone_number' => 'required|numeric|min:7|max:15',
      'is_provider' => 'required',
      'old_password' => 'required',
      'password' => 'confirmed|min:6|different:old_password',
    ]);
    var_dump('expression', $errors);

    return redirect('/');
  }
}
