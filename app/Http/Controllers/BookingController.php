<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Booking;
use App\Review;

class BookingController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index() {
    	$bookings = Booking::where('parent_id', '=', Auth::user()->id)->get();
    	$counts['past'] = Booking::where('parent_id', '=', Auth::user()->id)->where('status', '!=', '0')->count();
    	$counts['total'] = $bookings->count();
    	$counts['current'] = Booking::where('parent_id', '=', Auth::user()->id)->where('status', '=', '0')->count();

    	return view('activities.dashboard', ['bookings' => $bookings, 'counts' => $counts]);
    }

    public function complete(Request $request) {
    	if ($request->ajax()) {
    		$validator = Validator::make($request->all(), [
    			'booking_id' => ['required'],
    			'review_rate' => ['required'],
    			'review_content' => ['required'],
    		]);

    		if ($validator->fails()) {
    			return response()->json($validator->errors(), 400);
    		}

    		$booking = Booking::find($request->input('booking_id'));
    		$booking->status = 1;
    		
	    		$review = new Review();
	    		// $review->booking_id = $booking->id;
	    		$review->provider_id = $booking->provider_id;
	    		$review->content = $request->input('review_content');
	    		$review->rate = $request->input('review_rate');
	    		$review->rated_by = Auth::user()->id;
	    		$review->save();

	    	$booking->review_id = $review->id;
    		$booking->save();

    		return response()->json(['message' => 'successfull completed.'], 200);
    	}
    }
}
