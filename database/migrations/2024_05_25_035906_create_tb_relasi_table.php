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
        Schema::create('tb_relasi', function (Blueprint $table) {
            $table->increments('kode_relasi');
            $table->string('kode_gejala');
            $table->string('kode_penyakit');
            $table->float('mb')->comment('Nilai Kepastian');

            $table->foreign('kode_gejala')->references('kode_gejala')->on('tb_gejala');
            $table->foreign('kode_penyakit')->references('kode_penyakit')->on('tb_penyakit');
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
        Schema::dropIfExists('tb_relasi');
    }
};
