<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(){

$users = [
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
            ],

            [
                'id' => 2,
                'name' => 'Teacher',
                'email' => 'teacher@gmail.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
            ],

            [
                'id' => 3,
                'name' => 'Student',
                'email' => 'student@gmail.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
            ],

        ];

        User::insert($users);
    }

}
