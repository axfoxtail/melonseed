<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $table = 'locations';

    protected $fillable = [
        'location_name',
    ];

    public $timestamps= true;

    // public function activityTypes() {
    // 	return $this->hasMany(ActivityType::class);
    // }

    // public function providers() {
    // 	return $this->belongsTo(Provider::class);
    // }
}
