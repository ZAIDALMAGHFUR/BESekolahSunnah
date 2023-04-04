<?php

namespace Database\Seeders;

use App\Models\BookMark;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookMarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookMark::create([
            'users_id' => 2,
            'nama_sekolah_id' => 1,
        ]);

        BookMark::create([
            'users_id' => 2,
            'nama_sekolah_id' => 2,
        ]);
    }
}
