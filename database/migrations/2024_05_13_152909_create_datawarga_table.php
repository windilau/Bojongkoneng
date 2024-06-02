<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatawargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datawarga', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nik');
            $table->string('nama_lengkap');
            $table->string('tempat_tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('alamat_ktp');
            $table->string('alamat_domisili');
            $table->string('desa_kelurahan');
            $table->string('kecamatan');
            $table->string('kab_kota');
            $table->string('provinsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('datawarga');
    }
}
