<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ClassroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacherID= 1;
        $data = [
            [
                'name' => 'test classroom',
                'slug' =>Str::slug('test classroom'),
                'teacher_id' => $teacherID,
            ],
            [
                'name' => 'test classroom 2',
                'slug' =>Str::slug('test classroom 2'),
                'teacher_id' => $teacherID,
            ],
        ];

        DB::table('classrooms')->insert($data);
    }
}
