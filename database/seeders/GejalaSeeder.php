<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_gejala')->insert([
            ['kode_gejala' => 'D01', 'nama_gejala' => 'Pandangan kabur saat melihat objek'],
            ['kode_gejala' => 'D02', 'nama_gejala' => 'Sering menyipitkan mata'],
            ['kode_gejala' => 'D03', 'nama_gejala' => 'Sakit kepala'],
            ['kode_gejala' => 'D04', 'nama_gejala' => 'Mata lelah'],
            ['kode_gejala' => 'D05', 'nama_gejala' => 'Sering menggosok mata'],
            ['kode_gejala' => 'D06', 'nama_gejala' => 'Frekuensi mengedipkan mata yang berlebihan'],
            ['kode_gejala' => 'D07', 'nama_gejala' => 'Melihat objek jauh terlihat jelas'],
            ['kode_gejala' => 'D08', 'nama_gejala' => 'Melihat objek dekat terlihat buram'],
            ['kode_gejala' => 'D09', 'nama_gejala' => 'Mengerlingkan mata untuk melihat objek jelas'],
            ['kode_gejala' => 'D10', 'nama_gejala' => 'Kesulitan membaca'],
            ['kode_gejala' => 'D11', 'nama_gejala' => 'Mata terasa panas dan gatal'],
            ['kode_gejala' => 'D12', 'nama_gejala' => 'Distorsi penglihatan'],
            ['kode_gejala' => 'D13', 'nama_gejala' => 'Pandangan samar'],
            ['kode_gejala' => 'D14', 'nama_gejala' => 'Sulit melihat saat malam hari'],
            ['kode_gejala' => 'D15', 'nama_gejala' => 'Mata sering tegang dan mudah lelah'],
            ['kode_gejala' => 'D16', 'nama_gejala' => 'Sensitif pada sorotan cahaya'],
            ['kode_gejala' => 'D17', 'nama_gejala' => 'Kesulitan membedakan warna yang mirip'],
            ['kode_gejala' => 'D18', 'nama_gejala' => 'Penglihatan ganda'],
            ['kode_gejala' => 'D19', 'nama_gejala' => 'Membutuhkan penerangan lebih saat membaca'],
            ['kode_gejala' => 'D20', 'nama_gejala' => 'Sulit membaca huruf berukuran kecil'],
        ]);
    }
}
