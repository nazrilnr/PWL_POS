<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function index()
    // {
        // tambah data user dengan Eloquent Model
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4
        // ];
        // UserModel::insert($data); // tambahkan data ke tabel m_user

        // // coba akses model UserModel
        // $user = UserModel::all(); // ambil semua data dari tabel m_user
        // return view('user', ['data' => $user]);

        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // Usermodel::where('username', 'Customer-1') ->update($data);

        // $user = Usermodel::all();
        // return view('user', ['data' => $user]);

        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_dua',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make(12345)
        // ];
        // UserModel::create($data);

        // $user = UserModel::all();
        // return view('user', ['data' => $user]);

        // $user = UserModel::firstWhere('level_id', 2);
        // return view('user', ['data' => $user]);

        // $user = UserModel::findOr(1, ['username', 'nama'], function () {
        //     abort(404);
        // });
        
        // return view('user', ['data' => $user]);

        // $user = UserModel::firstorCreate(
        //         [
        //             'username' => 'manager',
        //             'nama' => 'manager',
        //             'level_id' => 2
        //         ]
        //     );
        //  return view('user', ['data' => $user]);

        // $user = UserModel::firstOrCreate(
        //     ['username' => 'manager22'], // Kondisi pencarian
        //     [ 
        //         'nama' => 'Manager Dua Dua',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ]
        // );
        // return view('user', ['data' => $user]);

        // $user = UserModel::firstOrNew(
        //     ['username' => 'manager',
        //      'nama' => 'Manager',
        //     ],
        // );
        // return view('user', ['data' => $user]);

    //     $user = UserModel::firstOrNew(
    //         ['username' => 'manager33',
    //          'nama' => 'Manager Tiga Tiga',
    //          'password' => Hash::make('12345'),
    //          'level_id' => 2
    //         ],
    //     );
    //     $user -> save();
    //     return view('user', ['data' => $user]);
    // }



    // public function index() {
        //{
    //         $user = UserModel::create([
    //             'username' => 'manager55',
    //             'nama' => 'Manager55',
    //             'password' => Hash::make('12345'),
    //             'level_id' => 2,
    //         ]);

    //         $user->username = 'manager56';

    //         $user->isDirty(); // true
    //         $user->isDirty('username'); // true
    //         $user->isDirty('nama'); // false
    //         $user->isDirty(['nama', 'username']); // true

    //         $user->isClean(); // false
    //         $user->isClean('username'); // false
    //         $user->isClean('nama'); // true
    //         $user->isClean(['nama', 'username']); // false

    //         $user->save();

    //         $user->isDirty(); // false
    //         $user->isClean(); // true
    //         dd($user->isDirty());
    //     }
    // }

        //     $user = UserModel::create([
        //         'username' => 'manager11',
        //         'nama' => 'Manager11',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2,
        //     ]);
        
        //     $user->username = 'manager12';
        
        //     $user->save();
        
        //     $user->wasChanged(); // true
        //     $user->wasChanged('username'); // true
        //     $user->wasChanged(['username', 'level_id']); // true
        //     $user->wasChanged('nama'); // false
        
        //     dd($user->wasChanged(['nama', 'username'])); // true
        // }


        // public function index(){
        //     $user =UserModel::all();
        //     return view('user', ['data' => $user]);
        // }
    
        public function tambah() {
            return view('user_tambah');
        }

        public function tambah_simpan(Request $request){
            UserModel::create([
                'username' => $request->username,
                'nama' => $request->nama,
                'password' => Hash::make($request->password),
                'level_id' => $request->level_id
            ]);
        
            return redirect('/user');
        }

        public function ubah($id) {
            $user =UserModel::find($id);
            return view ('user_ubah', ['data' => $user]);
        }
        
        public function ubah_simpan($id, Request $request){
            $user = UserModel::find($id);
        
            $user->username = $request->username;
            $user->nama = $request->nama;
            $user->level_id = $request->level_id;
        
            $user->save();
            return redirect('/user');
        }

        public function hapus($id)
        {
            $user = UserModel::find($id);
            $user->delete();

            return redirect('/user');
        }

        // public function index(){
        //     $user =UserModel::with('level')->get();
        //     dd($user);
        // }

        public function index(){
            $user =UserModel::with('level')->get();
            return view('user', ['data' => $user]);
    }
    
}