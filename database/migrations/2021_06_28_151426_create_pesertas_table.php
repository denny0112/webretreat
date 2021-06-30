<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->integerIncrements('peserta_nrp');
            $table->longText('peserta_nama');
            $table->string('peserta_jurusan',100);
            $table->string('peserta_jenis',20);
            $table->string('peserta_kontak',100);
            $table->longText('peserta_alergi');
            $table->integer('peserta_status')->default(0);
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
        Schema::dropIfExists('pesertas');
    }
}
