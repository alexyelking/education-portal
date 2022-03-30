<?php

use Illuminate\Database\Seeder;

class TestQuestionsTableSeeder extends Seeder
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
                'task_block_id' => 1,
                'text' => "What is a meaning of life?",
                'correct_count' => 1,
                'wrong_count' => 3,
            ],
            [
                'task_block_id' => 1,
                'text' => "What is not a meaning of life?",
                'correct_count' => 3,
                'wrong_count' => 1,
            ],
            [
                'task_block_id' => 2,
                'text' => "What is a meaning of life?",
                'correct_count' => 1,
                'wrong_count' => 3,
            ],
            [
                'task_block_id' => 2,
                'text' => "What is not a meaning of life?",
                'correct_count' => 3,
                'wrong_count' => 1,
            ],
            [
                'task_block_id' => 3,
                'text' => "What is a meaning of life?",
                'correct_count' => 1,
                'wrong_count' => 3,
            ],
            [
                'task_block_id' => 3,
                'text' => "What is not a meaning of life?",
                'correct_count' => 3,
                'wrong_count' => 1,
            ],

        ];

        DB::table('test_questions')->insert($data);
    }
}
