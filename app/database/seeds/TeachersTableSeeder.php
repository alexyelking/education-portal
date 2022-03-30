<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeachersTableSeeder extends Seeder
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
                'name' => 'teacherName',
                'email' => 'teacher@mail.com',
                'password' => Hash::make('password')
            ]
        ];

        DB::table('teachers')->insert($data);
    }
}
