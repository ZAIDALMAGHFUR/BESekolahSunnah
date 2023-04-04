<?php

namespace Database\Seeders;

use App\Models\nama_sekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        nama_sekolah::create([
            'nama_sekolah' => 'SMK Negeri 1 Cimahi',
            'alamat_sekolah' => 'Jl. Raya Cimahi No. 1, Cimahi',
            'deskripsi' => 'sekolah sunnah enak dan jos',
            'website_sekolah' => 'smkn1cimahi.sch.id',
            'tingkatan_sekolah' => 'SMA/SMK',
        ]);
        nama_sekolah::create([
            'nama_sekolah' => 'IDN Boarding School',
            'alamat_sekolah' => 'Jonggol',
            'deskripsi' => 'sekolah sunnah enak dan jos',
            'website_sekolah' => 'idnboarding.sch.id',
            'tingkatan_sekolah' => 'SMA/SMK',
        ]);

    }
}
