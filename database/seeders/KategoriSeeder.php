<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $data = [
        ['kategori_id' => 1, 'kategori_kode' => 'FOOD', 'kategori_nama' => 'Food & Beverages'],
            ['kategori_id' => 2, 'kategori_kode' => 'ELEC', 'kategori_nama' => 'Electronics'],
            ['kategori_id' => 3, 'kategori_kode' => 'CLOT', 'kategori_nama' => 'Clothing'],
            ['kategori_id' => 4, 'kategori_kode' => 'HOME', 'kategori_nama' => 'Home Appliances'],
            ['kategori_id' => 5, 'kategori_kode' => 'TOY', 'kategori_nama' => 'Toys'],
        ];

        DB::table('m_kategori')->insert(($data));
    }
}
