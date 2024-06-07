<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tabel relasi gejala dan penyakit
        $relasi_data = [
            // Relasi untuk penyakit Miopia (K01)
            [
                'kode_gejala' => 'D01',
                'kode_penyakit' => 'K01',
                'mb' => 0.7,
            ],
            [
                'kode_gejala' => 'D03',
                'kode_penyakit' => 'K01',
                'mb' => 0.5,
            ],
            [
                'kode_gejala' => 'D05',
                'kode_penyakit' => 'K01',
                'mb' => 0.8,
            ],
            [
                'kode_gejala' => 'D06',
                'kode_penyakit' => 'K01',
                'mb' => 0.7,
            ],
            [
                'kode_gejala' => 'D04',
                'kode_penyakit' => 'K01',
                'mb' => 0.8,
            ],

            // Relasi untuk penyakit Hipermetropia (K02)
            [
                'kode_gejala' => 'D11',
                'kode_penyakit' => 'K02',
                'mb' => 0.7,
            ],
            [
                'kode_gejala' => 'D07',
                'kode_penyakit' => 'K02',
                'mb' => 0.8,
            ],
            [
                'kode_gejala' => 'D03',
                'kode_penyakit' => 'K02',
                'mb' => 0.6,
            ],
            [
                'kode_gejala' => 'D09',
                'kode_penyakit' => 'K02',
                'mb' => 0.7,
            ],
            [
                'kode_gejala' => 'D08',
                'kode_penyakit' => 'K02',
                'mb' => 0.6,
            ],
            [
                'kode_gejala' => 'D10',
                'kode_penyakit' => 'K02',
                'mb' => 0.6,
            ],

            // Relasi untuk penyakit Astigmatisma (K03)
            [
                'kode_gejala' => 'D12',
                'kode_penyakit' => 'K03',
                'mb' => 0.8,
            ],
            [
                'kode_gejala' => 'D13',
                'kode_penyakit' => 'K03',
                'mb' => 0.7,
            ],
            [
                'kode_gejala' => 'D14',
                'kode_penyakit' => 'K03',
                'mb' => 0.5,
            ],
            [
                'kode_gejala' => 'D15',
                'kode_penyakit' => 'K03',
                'mb' => 0.9,
            ],
            [
                'kode_gejala' => 'D03',
                'kode_penyakit' => 'K03',
                'mb' => 0.8,
            ],
            [
                'kode_gejala' => 'D18',
                'kode_penyakit' => 'K03',
                'mb' => 0.7,
            ],
            [
                'kode_gejala' => 'D02',
                'kode_penyakit' => 'K03',
                'mb' => 0.9,
            ],
            [
                'kode_gejala' => 'D16',
                'kode_penyakit' => 'K03',
                'mb' => 0.7,
            ],

            // Relasi untuk penyakit Presbiopi (K04)
            [
                'kode_gejala' => 'D02',
                'kode_penyakit' => 'K04',
                'mb' => 0.5,
            ],
            [
                'kode_gejala' => 'D03',
                'kode_penyakit' => 'K04',
                'mb' => 0.7,
            ],
            [
                'kode_gejala' => 'D15',
                'kode_penyakit' => 'K04',
                'mb' => 0.6,
            ],
            [
                'kode_gejala' => 'D20',
                'kode_penyakit' => 'K04',
                'mb' => 0.7,
            ],
            [
                'kode_gejala' => 'D01',
                'kode_penyakit' => 'K04',
                'mb' => 0.8,
            ],
            [
                'kode_gejala' => 'D17',
                'kode_penyakit' => 'K04',
                'mb' => 0.7,
            ],
            [
                'kode_gejala' => 'D19',
                'kode_penyakit' => 'K04',
                'mb' => 0.7,
            ],
        ];

        // Memasukkan data ke dalam tabel relasi tb_relasi
        foreach ($relasi_data as $relasi) {
            DB::table('tb_relasi')->insert($relasi);
        }
    }
}
