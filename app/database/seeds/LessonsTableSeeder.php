<?php

use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moduleId = 1;
        $data = [
            [
                'title' => 'Test lesson 0',
                'slug' => Str::slug('Test lesson 0'),
                'excerpt' => 'This is an excerpt from test lesson 0',
                'module_id' => 1,
                'position' => 0,
            ],
            [
                'title' => 'Test lesson 1',
                'slug' => Str::slug('Test lesson 1'),
                'excerpt' => 'This is an excerpt from test lesson 1',
                'module_id' => 1,
                'position' => 1
            ],
            [
                'title' => 'Test lesson 2',
                'slug' => Str::slug('Test lesson 2'),
                'excerpt' => 'This is an excerpt from test lesson 2',
                'module_id' => 1,
                'position' => 2
            ],
            [
                'title' => 'Test lesson 0',
                'slug' => Str::slug('Test lesson 0'),
                'excerpt' => 'This is an excerpt from test lesson 0',
                'module_id' => 2,
                'position' => 0
            ],
            [
                'title' => 'Test lesson 1',
                'slug' => Str::slug('Test lesson 1'),
                'excerpt' => 'This is an excerpt from test lesson 1',
                'module_id' => 2,
                'position' => 1
            ],

        ];

        DB::table('lessons')->insert($data);
    }
}
