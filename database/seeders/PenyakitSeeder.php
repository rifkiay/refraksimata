<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert new records
        DB::table('tb_penyakit')->insert([
            ['kode_penyakit' => 'K01', 'nama_penyakit' => 'Miopia'],
            ['kode_penyakit' => 'K02', 'nama_penyakit' => 'Hipermetropia'],
            ['kode_penyakit' => 'K03', 'nama_penyakit' => 'Astigmatisma'],
            ['kode_penyakit' => 'K04', 'nama_penyakit' => 'Presbiopi'],
        ]);
    }
}
