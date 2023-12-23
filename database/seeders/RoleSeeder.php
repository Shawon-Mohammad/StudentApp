<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id' => 1,
                'title' => 'Admin',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Teacher',
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'title' => 'Student',
                'created_at' => now(),
            ],

        ];

        Role::insert($roles);
    }
}
