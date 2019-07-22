<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $table = 'providers';

  protected $fillable = [
    'user_id', 'business_name', 'activity_type', 'location', 'category', 'distance', 'address', 'state', 'city', 'zip_code', 'phone_number', 'website', 'age_min', 'age_max', 'activity_description', 'social_media_links', 'banner_img', 'thumbnail_img', 'profile_img', 'business_hours', 'slug',
  ];

  public $timestamps= true;

  // public function users() {
  //   return $this->belongsTo(User::class);
  // }

  public function categories() {
    return $this->hasOne(Category::class, 'id', 'category');
  }

  public function activityTypes() {
    return $this->hasOne(ActivityType::class, 'id', 'activity_type');
  }
}
