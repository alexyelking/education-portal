<?php

use Illuminate\Database\Seeder;

class TaskBlocksTableSeeder extends Seeder
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
                'retries_count' => 3,
                'position' => 0,
                'cost' => 1,
                'lesson_id' => 1,
            ],
            [
                'retries_count' => 3,
                'position' => 1,
                'cost' => 1,
                'lesson_id' => 1,
            ],
            [
                'retries_count' => 3,
                'position' => 0,
                'cost' => 1,
                'lesson_id' => 2,
            ],

        ];

        DB::table('task_blocks')->insert($data);
    }
}
