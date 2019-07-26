<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';

    protected $fillable = [
        'provider_id', 'parent_id', 'start_date', 'end_date', 'status', 'review_id', 
    ];

    public $timestamps= true;

    public function providers() {
    	return $this->hasOne(Provider::class, 'id', 'provider_id');
    }

    public function reviews() {
    	return $this->hasOne(Review::class, 'id', 'review_id');
    }
}
