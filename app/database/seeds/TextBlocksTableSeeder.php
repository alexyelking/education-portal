<?php

use Illuminate\Database\Seeder;

class TextBlocksTableSeeder extends Seeder
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
                'lesson_id' => 1,
                'position' => 0,

                'content' => "# Header
                Alternatively, for H1 and H2, an underline-ish style:
                Alt-H1
                ======
                Alt-H2
                ------",

                ],
                [
                    'lesson_id' => 1,
                    'position' => 1,
    
                    'content' => "# Header ijhskdfjh
                    Alternatively, for H1 and H2, an underline-ish style:
                    Alt-H1
                    ======
                    Alt-H2
                    ------",
    
                    ],
                    [
                        'lesson_id' => 2,
                        'position' => 0,
        
                        'content' => "# Header
                        Alternatively, for H1 and H2, an underline-ish style:
                        Alt-H1
                        ======
                        Alt-H2
                        ------",
        
                    ]
        ];

        DB::table('text_blocks')->insert($data);
    }
}
