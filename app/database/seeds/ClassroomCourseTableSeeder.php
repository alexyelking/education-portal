<?php

use Illuminate\Database\Seeder;

class ClassroomCourseTableSeeder extends Seeder
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
                'classroom_id' => 1,
                'course_id' => 1
            ],
            [
                'classroom_id' => 1,
                'course_id' => 2
            ],
            [
                'classroom_id' => 1,
                'course_id' => 4
            ],


            [
                'classroom_id' => 2,
                'course_id' => 1
            ],
            [
                'classroom_id' => 2,
                'course_id' => 2
            ],
            [
                'classroom_id' => 2,
                'course_id' => 3
            ],
        ];

        DB::table('classroom_course')->insert($data);
    }
}
