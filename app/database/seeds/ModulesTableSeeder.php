<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
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
                'name' => 'Module 1 of course 1',
                'position' => 0,
                'course_id' => 1,
            ],
            [
                'name' => 'Module 2 of course 1',
                'position' => 1,
                'course_id' => 1
            ],
            [
                'name' => 'Module 1 of course 2',
                'position' => 0,
                'course_id' => 2
            ]
        ];

        DB::table('modules')->insert($data);
    }
}
