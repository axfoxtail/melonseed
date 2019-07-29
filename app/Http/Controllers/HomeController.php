<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Provider;

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
        if ($request->ajax()) {
            $results['my_location'] = getArrLocationFromIP($ip);
            $results['providers'] = Provider::all();
            return response()->json($results, 200);
        } else {
            return view('home', ['ip' => $ip, 'previous_url' => $request->input('route') ? $request->input('route') : '']);
        }
    }
}
