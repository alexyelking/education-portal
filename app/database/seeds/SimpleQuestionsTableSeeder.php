<?php

use Illuminate\Database\Seeder;

class SimpleQuestionsTableSeeder extends Seeder
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
                'text' => "enter what is the meaning of life",
                'keywords' => '42, kek, кек',
            ],
            [
                'task_block_id' => 2,
                'text' => "enter what is the meaning of life",
                'keywords' => '42, kek, кек',
            ],
            [
                'task_block_id' => 2,
                'text' => "enter what is the meaning of life",
                'keywords' => '42, kek, кек',
            ],

        ];

        DB::table('simple_questions')->insert($data);
    }
}
