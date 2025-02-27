<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $data = [
        ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'B001', 'barang_nama' => 'Burger', 'harga_beli' => 10000, 'harga_jual' => 15000],
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'B002', 'barang_nama' => 'Pizza', 'harga_beli' => 20000, 'harga_jual' => 30000],
            ['barang_id' => 3, 'kategori_id' => 2, 'barang_kode' => 'E001', 'barang_nama' => 'Laptop', 'harga_beli' => 5000000, 'harga_jual' => 6000000],
            ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' => 'E002', 'barang_nama' => 'Smartphone', 'harga_beli' => 3000000, 'harga_jual' => 3500000],
            ['barang_id' => 5, 'kategori_id' => 3, 'barang_kode' => 'C001', 'barang_nama' => 'T-Shirt', 'harga_beli' => 50000, 'harga_jual' => 75000],
            ['barang_id' => 6, 'kategori_id' => 3, 'barang_kode' => 'C002', 'barang_nama' => 'Jeans', 'harga_beli' => 100000, 'harga_jual' => 150000],
            ['barang_id' => 7, 'kategori_id' => 4, 'barang_kode' => 'H001', 'barang_nama' => 'Blender', 'harga_beli' => 250000, 'harga_jual' => 350000],
            ['barang_id' => 8, 'kategori_id' => 4, 'barang_kode' => 'H002', 'barang_nama' => 'Microwave', 'harga_beli' => 700000, 'harga_jual' => 850000],
            ['barang_id' => 9, 'kategori_id' => 5, 'barang_kode' => 'T001', 'barang_nama' => 'Lego Set', 'harga_beli' => 200000, 'harga_jual' => 300000],
            ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' => 'T002', 'barang_nama' => 'Action Figure', 'harga_beli' => 150000, 'harga_jual' => 225000],
        ];

        DB::table('m_barang')->insert(($data));
    }
}
