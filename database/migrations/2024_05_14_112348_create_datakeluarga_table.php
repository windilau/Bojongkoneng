<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DataKeluarga', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('no_KK');
            $table->string('Id_KK');
            $table->string('Alamat');
            $table->string('desa_lurah');
            $table->string('kecamatan');
            $table->string('kab_kota');
            $table->string('prov');
            $table->string('negara');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DataKeluarga');
    }
}