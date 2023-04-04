<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'roles_id' => 1,
        ]);

        User::create([
            'username' => 'User',
            'email' => 'dosen@gmail.com',
            'password' => bcrypt('password'),
            'roles_id' => 2,
        ]);
    }
}
