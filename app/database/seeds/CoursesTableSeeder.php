<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $creatorId = 1;
        //
        $data = [
            [
                'title' => 'Test course 0',
                'slug' => Str::slug('Test course 0'),
                'description_short' => 'This is a short description of test course 0',
                'description' => 'This is a description of test course 0',
                'tags' => 'tag0, tag1',
                'image' => '#',
                'video' => '#',
                'created_by' => $creatorId
            ],
            [
                'title' => 'Test course 1',
                'slug' => Str::slug('Test course 1'),
                'description_short' => 'This is a short description of test course 1',
                'description' => 'This is a description of test course 1 This is a description of test course 1 This is a description of test course 1',
                'tags' => 'tag0, tag1',
                'image' => '#',
                'video' => '#',
                'created_by' => $creatorId
            ],
            [
                'title' => 'Test course 2',
                'slug' => Str::slug('Test course 2'),
                'description_short' => 'This is a short description of test course 2',
                'description' => 'This is a description of test course 2 This is a description of test course 2 This is a description of test course 2',
                'tags' => 'tag0, tag1',
                'image' => '#',
                'video' => '#',
                'created_by' => $creatorId
            ],
            [
                'title' => 'Another test course',
                'slug' => Str::slug('Another test course'),
                'description_short' => 'This is a short description of another test course',
                'description' => 'This is a description of another test course This is a description ofadsfgasgasdg This is a description of asdfasddfasadfsaddf',
                'tags' => 'tag0, tag1',
                'image' => '#',
                'video' => '#',
                'created_by' => $creatorId
            ]
        ];

        DB::table('courses')->insert($data);
    }
}
