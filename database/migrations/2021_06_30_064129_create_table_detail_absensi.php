<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetailAbsensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_absensi', function (Blueprint $table) {
            $table->integerIncrements('detail_absensi_id');
            $table->integer('sesi_id')->unsigned();
            $table->integer('peserta_nrp')->unsigned();
            $table->timestamps();

            $table->foreign('sesi_id')->references('sesi_id')->on('sesis');
            $table->foreign('peserta_nrp')->references('peserta_nrp')->on('pesertas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_absensi');
    }
}
