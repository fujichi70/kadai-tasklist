<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TasklistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for ($i = 1; $i <= 4; $i++) {
            \DB::table('tasklist')->insert([
                'user_id' => $i,
                'content' => 'test'.$i,
                'status' => '未実行',
            ]);
        }
    }
}
