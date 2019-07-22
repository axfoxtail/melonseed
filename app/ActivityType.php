<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    //
    protected $table = 'activity_types';

    protected $fillable = [
        'category_id', 'activity_type_name',
    ];

    public $timestamps= true;

    public function providers() {
    	return $this->belongsTo(Provider::class);
    }
}
