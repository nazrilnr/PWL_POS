<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index()
    {
        // Insert data baru
        // DB::insert(
        //     'INSERT INTO m_level (level_kode, level_nama, created_at) VALUES (?, ?, ?)',
        //     ['cus', 'Pelanggan', now()]
        // );

        // Update data yang baru saja dimasukkan
    //     $row = DB::update(
    //         'UPDATE m_level SET level_nama = ? WHERE level_kode = ?', ['Customer', 'cus']
    //     );

    //    return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';

        // Melakukan delete data pada tabel m_level berdasarkan level_kode
        // $row = DB::delete(
        //     'DELETE FROM m_level WHERE level_kode = ?',
        //     ['cus']
        // );

        // // Mengembalikan jumlah baris yang dihapus
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row . ' baris';

        $data = DB::select('select * from m_level');
        return view('level', ['data' => $data]);
    }
}
