<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasi', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_lengkap');
            $table->string('no_kk');
            $table->string('nik');
            $table->string('jenis_kelamin');
            $table->string('alamat_sebelum');
            $table->string('desa_sebelum');
            $table->string('kec_sebelum');
            $table->string('kab_sebelum');
            $table->string('prov_sebelum');
            $table->string('alamat_sesudah');
            $table->string('desa_sesudah');
            $table->string('kec_sesudah');
            $table->string('kab_sesudah');
            $table->string('prov_sesudah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasi');
    }
}