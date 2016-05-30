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
        DB::table('users')->insert([
            [
            'name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('111111'),
            'verified' => 1
            ], [
            'name' => 'user',
            'last_name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('111111'),
            'verified' => 1
            ]
        ]);
    }
}
