<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 4; $i++) {
            \DB::table('users')->insert([
                'name' => 'test'.$i,
                'email' => 'test'.$i.'@test.com',
                'password' => \Hash::make('password123'),
            ]);
        }
        
    }
}
