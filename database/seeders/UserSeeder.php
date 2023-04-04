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
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'roles_id' => 1,
        ]);

        User::create([
            'first_name' => 'Dosen',
            'last_name' => 'Dosen',
            'email' => 'dosen@gmail.com',
            'password' => bcrypt('password'),
            'roles_id' => 2,
        ]);
    }
}
