<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(['key' => 'adwords_skyscraper', 
                        'value' => '', 
                    ]);
        DB::table('settings')->insert(['key' => 'adwords_square', 
                        'value' => '', 
                    ]);
    }
}
