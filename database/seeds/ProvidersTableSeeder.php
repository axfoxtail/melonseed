<?php

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->insert(['user_id' => 1,
                                    'business_name' => 'Summer Swim School', 
                                    'category' => 1, 
                                    'activity_type' => 1, 
                                    'location' => 'Algoma', 
                                    'latitude' => '', 
                                    'longitude' => '',
                                    'address' => '', 
                                    'phone_number' => '12346798', 
                                    'website' => 'summer.com', 
                                    'age_range' => ', age1, age2', 
                                    'activity_description' => 'this is sample description for the SSS(Summer Swim School).', 
                                    'social_media_links' => '', 
                                    'banner_img' => '', 
                                    'thumbnail_img' => '', 
                                    'profile_img' => '', 
                                    'business_hours' => '', 
                                    'permission' => '1'
                                ]);
        DB::table('providers')->insert(['user_id' => 2,
                                    'business_name' => 'Fall Climbing School', 
                                    'category' => 1, 
                                    'activity_type' => 2, 
                                    'location' => 'Algoma', 
                                    'latitude' => '', 
                                    'longitude' => '',
                                    'address' => '', 
                                    'phone_number' => '12346798', 
                                    'website' => 'fall.com', 
                                    'age_range' => ', age1, age2', 
                                    'activity_description' => 'this is sample description for the Fall Climbing School.', 
                                    'social_media_links' => '', 
                                    'banner_img' => '', 
                                    'thumbnail_img' => '', 
                                    'profile_img' => '', 
                                    'business_hours' => '', 
                                    'permission' => '1'
                                ]);
        DB::table('providers')->insert(['user_id' => 3,
                                    'business_name' => 'Winter Ski School', 
                                    'category' => 1, 
                                    'activity_type' => 3, 
                                    'location' => 'Algoma', 
                                    'latitude' => '', 
                                    'longitude' => '',
                                    'address' => '', 
                                    'phone_number' => '12346798', 
                                    'website' => 'summer.com', 
                                    'age_range' => ', age1, age2', 
                                    'activity_description' => 'this is sample description for the Winter Ski School.', 
                                    'social_media_links' => '', 
                                    'banner_img' => '', 
                                    'thumbnail_img' => '', 
                                    'profile_img' => '', 
                                    'business_hours' => '', 
                                    'permission' => '1'
                                ]);
        DB::table('providers')->insert(['user_id' => 4,
                                    'business_name' => 'Winter Skating School', 
                                    'category' => 1, 
                                    'activity_type' => 4, 
                                    'location' => 'Algoma', 
                                    'latitude' => '', 
                                    'longitude' => '',
                                    'address' => '', 
                                    'phone_number' => '12346798', 
                                    'website' => 'summer.com', 
                                    'age_range' => ', age1, age2', 
                                    'activity_description' => 'this is sample description for the Winter Skating School.', 
                                    'social_media_links' => '', 
                                    'banner_img' => '', 
                                    'thumbnail_img' => '', 
                                    'profile_img' => '', 
                                    'business_hours' => '', 
                                    'permission' => '1'
                                ]);
            DB::table('providers')->insert(['user_id' => 5,
                                    'business_name' => 'Spring Art School', 
                                    'category' => 2, 
                                    'activity_type' => 1, 
                                    'location' => 'Algoma', 
                                    'latitude' => '', 
                                    'longitude' => '',
                                    'address' => '', 
                                    'phone_number' => '12346798', 
                                    'website' => 'spring.com', 
                                    'age_range' => ', age1, age2', 
                                    'activity_description' => 'this is sample description for the Spring Art School.', 
                                    'social_media_links' => '', 
                                    'banner_img' => '', 
                                    'thumbnail_img' => '', 
                                    'profile_img' => '', 
                                    'business_hours' => '', 
                                    'permission' => '1'
                                ]);
    }
}
