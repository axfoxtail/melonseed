<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert(['provider_id' => 1, 
                        'content' => 'The activities were great.', 
                        'rate' => 5.0, 
                        'rated_by' => 8, 
                        'permission' => '0', 
                    ]);
    }
}
