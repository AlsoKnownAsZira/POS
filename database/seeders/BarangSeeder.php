<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
[
'barang_id' => 1,
'kategori_id' => 1,
'barang_kode' => 'BG1',
'barang_nama' => 'Pampers Gacor',
'harga_beli' => 10000,
'harga_jual' => 12500,
],
[
'barang_id' => 2,
'kategori_id' => 1,
'barang_kode' => 'BG2',
'barang_nama' => 'Susu Bocil',
'harga_beli' => 25000,
'harga_jual' => 28000,
],
[
'barang_id' => 3,
'kategori_id' => 2,
'barang_kode' => 'BG3',
'barang_nama' => 'Keripik Kentung',
'harga_beli' => 4500,
'harga_jual' => 5000,
],
[
'barang_id' => 4,
'kategori_id' => 2,
'barang_kode' => 'BG4',
'barang_nama' => 'Teh square',
'harga_beli' => 2500,
'harga_jual' => 3000,
],
[
'barang_id' => 5,
'kategori_id' => 3,
'barang_kode' => 'BG5',
'barang_nama' => 'Paracetamol',
'harga_beli' => 9500,
'harga_jual' => 11000,
],
[
'barang_id' => 6,
'kategori_id' => 3,
'barang_kode' => 'BG6',
'barang_nama' => 'Bedak badak',
'harga_beli' => 27500,
'harga_jual' => 30000,
],
[
'barang_id' => 7,
'kategori_id' => 4,
'barang_kode' => 'BG7',
'barang_nama' => 'Lampu Terang',
'harga_beli' => 11000,
'harga_jual' => 15000,
],
[
'barang_id' => 8,
'kategori_id' => 4,
'barang_kode' => 'BG8',
'barang_nama' => 'Keset Welcome',
'harga_beli' => 12000,
'harga_jual' => 15000,
],
[
'barang_id' => 9,
'kategori_id' => 5,
'barang_kode' => 'BG9',
'barang_nama' => 'Buku tulis',
'harga_beli' => 1250,
'harga_jual' => 1500,
],
[
'barang_id' => 10,
'kategori_id' => 5,
'barang_kode' => 'BG10',
'barang_nama' => 'Pulpen Biru',
'harga_beli' => 1500,
'harga_jual' => 2500,
],
       ];
       DB::table('m_barang')->insert($data);
    }
}
