<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 3,
                'pembeli'=> 'Zira',
                'penjualan_tanggal' => '2024-01-05',
            ],
            [
                'penjualan_id' =>2,
                'user_id' => 3,
                'pembeli'=> 'Mbappe',
                'penjualan_tanggal' => '2024-01-07',
            ],
            [
                'penjualan_id' =>3,
                'user_id' => 3,
                'pembeli'=> 'Rusdi',
                'penjualan_tanggal' => '2024-01-12',
            ],
            [
                'penjualan_id' =>4,
                'user_id' => 3,
                'pembeli'=> 'Rahma',
                'penjualan_tanggal' => '2024-01-19',
            ],
            [
                'penjualan_id' =>5,
                'user_id' => 3,
                'pembeli'=> 'Onana',
                'penjualan_tanggal' => '2024-01-25',
            ],
            [
                'penjualan_id' =>6,
                'user_id' => 3,
                'pembeli'=> 'Messi',
                'penjualan_tanggal' => '2024-01-31',
            ],
            [
                'penjualan_id' =>7,
                'user_id' => 3,
                'pembeli'=> 'Yulastri',
                'penjualan_tanggal' => '2024-02-01',
            ],
            [
                'penjualan_id' =>8,
                'user_id' => 3,
                'pembeli'=> 'Neymar',
                'penjualan_tanggal' => '2024-02-02',
            ],
            [
                'penjualan_id' =>9,
                'user_id' => 3,
                'pembeli'=> 'Ten hag',
                'penjualan_tanggal' => '2024-02-02',
            ],
            [
                'penjualan_id' =>10,
                'user_id' => 3,
                'pembeli'=> 'Ronaldo',
                'penjualan_tanggal' => '2024-02-03',
            ],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
