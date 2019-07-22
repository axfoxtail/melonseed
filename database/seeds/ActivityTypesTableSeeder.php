<?php

use Illuminate\Database\Seeder;

class ActivityTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activity_types')->insert(['category_id' => 1, 'activity_type_name' => 'Swimming']);
        DB::table('activity_types')->insert(['category_id' => 1, 'activity_type_name' => 'Gymnastics']);
        DB::table('activity_types')->insert(['category_id' => 1, 'activity_type_name' => 'Hockey']);
        DB::table('activity_types')->insert(['category_id' => 1, 'activity_type_name' => 'Baseball']);
        DB::table('activity_types')->insert(['category_id' => 1, 'activity_type_name' => 'Golf']);
        DB::table('activity_types')->insert(['category_id' => 1, 'activity_type_name' => 'Soccer']);
        DB::table('activity_types')->insert(['category_id' => 1, 'activity_type_name' => 'Rock Climbing']);
        DB::table('activity_types')->insert(['category_id' => 1, 'activity_type_name' => 'Martial Arts']);
        DB::table('activity_types')->insert(['category_id' => 1, 'activity_type_name' => 'Ice Skating']);
        DB::table('activity_types')->insert(['category_id' => 1, 'activity_type_name' => 'Tennis']);
        DB::table('activity_types')->insert(['category_id' => 1, 'activity_type_name' => 'Dance']);
        DB::table('activity_types')->insert(['category_id' => 1, 'activity_type_name' => 'Basketball']);
        DB::table('activity_types')->insert(['category_id' => 1, 'activity_type_name' => 'Horseback riding']);
        DB::table('activity_types')->insert(['category_id' => 1, 'activity_type_name' => 'Football']);
        DB::table('activity_types')->insert(['category_id' => 1, 'activity_type_name' => 'Other Sports']);
        DB::table('activity_types')->insert(['category_id' => 2, 'activity_type_name' => 'Music']);
        DB::table('activity_types')->insert(['category_id' => 2, 'activity_type_name' => 'Dance']);
        DB::table('activity_types')->insert(['category_id' => 2, 'activity_type_name' => 'Art']);
        DB::table('activity_types')->insert(['category_id' => 2, 'activity_type_name' => 'STEM']);
        DB::table('activity_types')->insert(['category_id' => 2, 'activity_type_name' => 'Theatre']);
    }
}
