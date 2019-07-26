<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = [
        'provider_id', 'content', 'rate', 'rated_by', 'permission', 
    ];

    public $timestamps= true;

    public function providers() {
    	return $this->hasOne(Provider::class, 'id', 'provider_id');
    }

    public function users() {
    	return $this->hasOne(User::class, 'id', 'rated_by');
    }

    public function bookings() {
        return $this->belongsTo(Booking::class);
    }
}
