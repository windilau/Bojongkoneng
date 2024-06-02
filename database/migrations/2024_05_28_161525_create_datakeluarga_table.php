<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatakeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datakeluarga', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('no_KK');
            $table->string('id_KK');
            $table->string('alamat');
            $table->string('desa_kelurahan');
            $table->string('kecamatan');
            $table->string('kab_kota');
            $table->string('provinsi');
            // $table->foreignId('villages_id')
            //     ->constrained()
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            // $table->foreignId('disctrics_id')
            //     ->constrained()
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            // $table->foreignId('regencies_id')
            //     ->constrained()
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            // $table->foreignId('provinces_id')
            //     ->constrained()
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');

            // $table->unsignedBigInteger('villages_id');
            // $table->foreign('villages_id')->references('id')->on('villages');
            // $table->unsignedBigInteger('districts_id');
            // $table->foreign('districts_id')->references('id')->on('districts');
            // $table->unsignedBigInteger('regencies_id');
            // $table->foreign('regencies_id')->references('id')->on('regencies');
            // $table->unsignedBigInteger('provinces_id');
            // $table->foreign('provinces_id')->references('id')->on('provinces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datakeluarga');
    }
}
