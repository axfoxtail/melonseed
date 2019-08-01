<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['username' => 'CoreAdmin', 
                        'email' => 'techblade.melonseed@gmail.com', 
                        'avatar' => '/img/avatars/default.jpg', 
                        'password' => '$2y$10$0oJ08el8vT6KWSdlNn1LXujGohivz0RBq3dbEIuIAF8DaoGyxEPXO', 
                        'role' => 'admin', 
                        'permission' => '1', 
                        'slug' => 'coreadmin', 
                        'register_ip' => '127.0.0.1', 
                        'login_ip' => '127.0.0.1', 
                    ]);
        DB::table('users')->insert(['username' => 'Blade', 
                        'email' => 'tech.blade.service@gmail.com', 
                        'avatar' => '/img/avatars/default.jpg', 
                        'password' => '$2y$10$0oJ08el8vT6KWSdlNn1LXujGohivz0RBq3dbEIuIAF8DaoGyxEPXO', 
                        'role' => 'provider', 
                        'permission' => '1', 
                        'slug' => 'coredeveloper', 
                        'register_ip' => '127.0.0.1', 
                        'login_ip' => '127.0.0.1', 
                    ]);
        DB::table('users')->insert(['username' => 'BladeParent', 
                        'email' => 'tech.blade@outlook.com', 
                        'avatar' => '/img/avatars/default.jpg', 
                        'password' => '$2y$10$0oJ08el8vT6KWSdlNn1LXujGohivz0RBq3dbEIuIAF8DaoGyxEPXO', 
                        'role' => 'provider', 
                        'permission' => '1', 
                        'slug' => 'tester', 
                        'register_ip' => '127.0.0.1', 
                        'login_ip' => '127.0.0.1', 
                    ]);
        DB::table('users')->insert(['username' => 'BladeProvider', 
                        'email' => 'tech.blade@hotmail.com', 
                        'avatar' => '/img/avatars/default.jpg', 
                        'password' => '$2y$10$0oJ08el8vT6KWSdlNn1LXujGohivz0RBq3dbEIuIAF8DaoGyxEPXO', 
                        'role' => 'provider', 
                        'permission' => '1', 
                        'slug' => 'tester', 
                        'register_ip' => '127.0.0.1', 
                        'login_ip' => '127.0.0.1', 
                    ]);
        DB::table('users')->insert(['username' => 'TestProvider', 
                        'email' => 'test.provider@gmail.com', 
                        'avatar' => '/img/avatars/default.jpg', 
                        'password' => '$2y$10$0oJ08el8vT6KWSdlNn1LXujGohivz0RBq3dbEIuIAF8DaoGyxEPXO', 
                        'role' => 'provider', 
                        'permission' => '1', 
                        'slug' => 'tester', 
                        'register_ip' => '127.0.0.1', 
                        'login_ip' => '127.0.0.1', 
                    ]);
        DB::table('users')->insert(['username' => 'TestProvider1', 
                        'email' => 'test.provider1@gmail.com', 
                        'avatar' => '/img/avatars/default.jpg', 
                        'password' => '$2y$10$0oJ08el8vT6KWSdlNn1LXujGohivz0RBq3dbEIuIAF8DaoGyxEPXO', 
                        'role' => 'provider', 
                        'permission' => '1', 
                        'slug' => 'tester', 
                        'register_ip' => '127.0.0.1', 
                        'login_ip' => '127.0.0.1', 
                    ]);
        DB::table('users')->insert(['username' => 'TestProvider2', 
                        'email' => 'test.provider2@gmail.com', 
                        'avatar' => '/img/avatars/default.jpg', 
                        'password' => '$2y$10$0oJ08el8vT6KWSdlNn1LXujGohivz0RBq3dbEIuIAF8DaoGyxEPXO', 
                        'role' => 'provider', 
                        'permission' => '1', 
                        'slug' => 'tester', 
                        'register_ip' => '127.0.0.1', 
                        'login_ip' => '127.0.0.1', 
                    ]);
        DB::table('users')->insert(['username' => 'TestParent', 
                        'email' => 'test.parent@gmail.com', 
                        'avatar' => '/img/avatars/default.jpg', 
                        'password' => '$2y$10$0oJ08el8vT6KWSdlNn1LXujGohivz0RBq3dbEIuIAF8DaoGyxEPXO', 
                        'role' => 'parent', 
                        'permission' => '2', 
                        'slug' => 'blade slug', 
                        'register_ip' => '127.0.0.1', 
                        'login_ip' => '127.0.0.1', 
                    ]);
        DB::table('users')->insert(['username' => 'TestParent1', 
                        'email' => 'test.parent1@gmail.com', 
                        'avatar' => '/img/avatars/default.jpg', 
                        'password' => '$2y$10$0oJ08el8vT6KWSdlNn1LXujGohivz0RBq3dbEIuIAF8DaoGyxEPXO', 
                        'role' => 'parent', 
                        'permission' => '2', 
                        'slug' => 'blade slug', 
                        'register_ip' => '127.0.0.1', 
                        'login_ip' => '127.0.0.1', 
                    ]);
        DB::table('users')->insert(['username' => 'TestParent2', 
                        'email' => 'test.parent2@gmail.com', 
                        'avatar' => '/img/avatars/default.jpg', 
                        'password' => '$2y$10$0oJ08el8vT6KWSdlNn1LXujGohivz0RBq3dbEIuIAF8DaoGyxEPXO', 
                        'role' => 'parent', 
                        'permission' => '2', 
                        'slug' => 'blade slug', 
                        'register_ip' => '127.0.0.1', 
                        'login_ip' => '127.0.0.1', 
                    ]);
    }
}
