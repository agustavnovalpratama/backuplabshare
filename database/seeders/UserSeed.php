<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'admin1',
                'email' => 'admin123@gmail.com',
                'password' => bcrypt('123'),
                'role' => 1
            ],

            [
                'name' => 'user1',
                'email' => 'user123@gmail.com',
                'password' => bcrypt('123'),
                'role' => 2
            ]
        ];

        foreach($data as $key => $d) {
            User::create($d);
        }
    }
}
