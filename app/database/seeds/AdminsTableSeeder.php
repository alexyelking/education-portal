<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
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
                'name' => 'Oscar',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password')
            ]
        ];

        DB::table('admins')->insert($data);
    }
}
