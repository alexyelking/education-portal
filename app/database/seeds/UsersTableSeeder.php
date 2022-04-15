<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
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
                'name' => 'Alex',
                'email' => 'user@mail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Jack',
                'email' => 'user2@mail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Charley',
                'email' => 'user3@mail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Oscar',
                'email' => 'anotherUser@mail.com',
                'password' => Hash::make('password'),
            ],
        ];

        DB::table('users')->insert($data);
    }
}
