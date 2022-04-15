<?php

use Illuminate\Database\Seeder;

class ClassroomInvitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'classroom_id' => 1,
                'user_id' => 1,
                'message_title' => 'Приглашение в класс',
                'title_slug' => Str::slug('invite title'),
                'message_text' => 'Приглашаем вас принять участие в прохождении курса по английскому языку',

            ]
        ];
        DB::table('classroom_invites')->insert($data);
    }
}
