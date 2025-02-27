<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['penjualan_id' => 1, 'user_id' => 1, 'pembeli' => 'Si Kancil', 'penjualan_kode' => 'TRX001', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 2, 'user_id' => 2, 'pembeli' => 'Adit Sopo J', 'penjualan_kode' => 'TRX002', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 3, 'user_id' => 3, 'pembeli' => 'Sarjano', 'penjualan_kode' => 'TRX003', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 4, 'user_id' => 1, 'pembeli' => 'Finding Nemo', 'penjualan_kode' => 'TRX004', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 5, 'user_id' => 2, 'pembeli' => 'Cars', 'penjualan_kode' => 'TRX005', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 6, 'user_id' => 3, 'pembeli' => 'Boboiboy', 'penjualan_kode' => 'TRX006', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 7, 'user_id' => 1, 'pembeli' => 'Ultraman', 'penjualan_kode' => 'TRX007', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 8, 'user_id' => 2, 'pembeli' => 'Larva', 'penjualan_kode' => 'TRX008', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 9, 'user_id' => 3, 'pembeli' => 'SpongeBob', 'penjualan_kode' => 'TRX009', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 10, 'user_id' => 1, 'pembeli' => 'Doraemon', 'penjualan_kode' => 'TRX010', 'penjualan_tanggal' => now()],
        ];

        DB::table('t_penjualan')->insert($data);

    }
}
