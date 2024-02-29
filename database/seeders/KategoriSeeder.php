<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'kategori_kode' => 'KT1',
                'kategori_nama' => 'Baby and Kids',
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => 'KT2',
                'kategori_nama' => 'Food and Beverages',
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => 'KT3',
                'kategori_nama' => 'Beauty and Health',
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => 'KT4',
                'kategori_nama' => 'Home care',
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => 'KT5',
                'kategori_nama' => 'Stationery',
            ],

        ];
        DB::table('m_kategori')->insert($data);
    }
}
