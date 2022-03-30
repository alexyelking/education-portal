<?php

use Illuminate\Database\Seeder;

class ClassroomUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            [
                'user_id' => 1,
                'classroom_id' => 1
            ],
            [
                'user_id' => 2,
                'classroom_id' => 1
            ],
            [
                'user_id' => 4,
                'classroom_id' => 1
            ],



            [
                'user_id' => 1,
                'classroom_id' => 2
            ],
            [
                'user_id' => 2,
                'classroom_id' => 2
            ],
            [
                'user_id' => 3,
                'classroom_id' => 2
            ],
        ];

        DB::table('classroom_user')->insert($data);
    }
}
