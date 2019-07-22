<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(['category_name' => 'Sports']);
        DB::table('categories')->insert(['category_name' => 'Arts & Other Learning']);
    }
}
