<?php

use Illuminate\Database\Seeder;

class VideoBlocksTableSeeder extends Seeder
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
                'link' => "https://www.youtube.com/watch?v=OWwUce_9GUE",
                'position' => 0,
                'lesson_id' => 1
            ],
            [
                'link' => "https://www.youtube.com/watch?v=FRwJy-BgXF4",
                'position' => 1,
                'lesson_id' => 1
            ],
            [
                'link' => "https://www.youtube.com/watch?v=gVKWiZmjZA0",
                'position' => 0,
                'lesson_id' => 2
            ]
        ];

        DB::table('video_blocks')->insert($data);
    }
}
