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
  protected $fillable = [
    'user_id', 'business_name', 'activity_type', 'location', 'category', 'distance', 'phone_number', 'website', 'age_min', 'age_max', 'activity_description', 'social_media_links', 'banner_img', 'thumbnail_img', 'profile_img', 'business_hours', 'slug',
  ];

  public $timestamps= true;
}
