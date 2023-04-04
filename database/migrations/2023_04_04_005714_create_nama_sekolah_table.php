<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nama_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->string('alamat_sekolah');
            $table->string('logo_sekolah')->nullable();
            $table->string('deskripsi');
            $table->string('website_sekolah');
            $table->enum('tingkatan_sekolah', ['SD', 'SMA/SMK', 'SMP/MTS']);
            $table->string('foto_sekolah')->nullable();
            $table->string('foto_sekolah2')->nullable();
            $table->string('foto_sekolah3')->nullable();
            $table->string('foto_sekolah4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nama_sekolah');
    }
};
