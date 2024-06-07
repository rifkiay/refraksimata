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
        Schema::create('tb_pasien', function (Blueprint $table) {
            $table->increments('kode_pasien');
            $table->string('nama');
            $table->enum('jenis_kelamin', ['1', '2'])->comment('1: Laki-laki, 2: Perempuan');
            $table->integer('umur');
            $table->date('tgl_diagnosa');
            $table->text('gejala_dipilih');
            $table->text('md')->comment('Nilai Ketidakpastian');
            $table->text('gambar')->nullable();
            $table->string('kode_penyakit')->nullable();
            $table->string('nama_penyakit')->nullable();
            $table->text('persentase_hasil')->nullable();
            $table->string('hasil')->nullable();
            $table->text('semua_hasil')->nullable();


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
        Schema::dropIfExists('tb_pasien');
    }
};
