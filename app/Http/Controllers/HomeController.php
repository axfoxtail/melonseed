<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $ip = $request->ip();
        // $ip = '104.247.132.212';
        $ip = '162.253.129.2';
        return view('home', ['ip' => $ip, 'previous_url' => $request->input('route') ? $request->input('route') : '']);
    }
}
