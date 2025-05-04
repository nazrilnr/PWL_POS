<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\levelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PenjualanDetailController;
use App\Http\Controllers\AuthController;

Route:: get ('/', [WelcomeController :: class,'index' ]);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/create_ajax', [UserController::class, 'create_ajax']);
    Route::post('/ajax', [UserController::class, 'store_ajax']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);
    Route::get('/{id}/show_ajax', [UserController::class, 'show_ajax']);

    Route::delete('/{id}', [UserController::class, 'destroy']);
});

Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
    Route::post('/ajax', [LevelController::class, 'store_ajax']);
    Route::get('/{id}', [LevelController::class, 'show']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);
    Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']);
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/list', [KategoriController::class, 'list']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
    Route::post('/ajax', [KategoriController::class, 'store_ajax']);
    Route::get('/{id}', [KategoriController::class, 'show']);
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/{id}', [KategoriController::class, 'update']);
    Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
    Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});

Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/list', [BarangController::class, 'list']);
    Route::get('/create', [BarangController::class, 'create']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
    Route::post('/ajax', [BarangController::class, 'store_ajax']);
    Route::get('/{id}', [BarangController::class, 'show']);
    Route::get('/{id}/edit', [BarangController::class, 'edit']);
    Route::put('/{id}', [BarangController::class, 'update']);
    Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
    Route::get('/{id}/show_ajax', [BarangController::class, 'show_ajax']);
    Route::delete('/{id}', [BarangController::class, 'destroy']);
});

// Stok Routes
Route::group(['prefix' => 'stok'], function () {
    Route::get('/', [StokController::class, 'index']);
    Route::post('/list', [StokController::class, 'list']);
    Route::get('/create', [StokController::class, 'create']);
    Route::post('/', [StokController::class, 'store']);
    Route::get('/create_ajax', [StokController::class, 'create_ajax']);
    Route::get('/stok/create_ajax', [StokController::class, 'create_ajax'])->name('stok.create_ajax');
    Route::post('/ajax', [StokController::class, 'store_ajax']);
    Route::get('/{id}', [StokController::class, 'show']);
    Route::get('/{id}/show', [StokController::class, 'show'])->name('stok.show');
    Route::get('/{id}/edit', [StokController::class, 'edit']);
    Route::put('/{id}', [StokController::class, 'update']);
    Route::get('/{id}/edit_ajax', [StokController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [StokController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [StokController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [StokController::class, 'delete_ajax']);
    Route::get('/{id}/show_ajax', [StokController::class, 'show_ajax']);
   // Route::delete('/{id}', [StokController::class, 'destroy']);
});

// Stok Routes
Route::group(['prefix' => 'penjualan'], function () {
    Route::get('/', [PenjualanController::class, 'index']);
    Route::post('/list', [PenjualanController::class, 'list']);
    Route::get('/create', [PenjualanController::class, 'create']);
    Route::post('/', [PenjualanController::class, 'store']);
    Route::get('/create_ajax', [PenjualanController::class, 'create_ajax']);
    Route::get('/stok/create_ajax', [PenjualanController::class, 'create_ajax'])->name('stok.create_ajax');
    Route::post('/ajax', [PenjualanController::class, 'store_ajax']);
    Route::get('/{id}', [PenjualanController::class, 'show']);
    Route::get('/{id}/show', [PenjualanController::class, 'show'])->name('stok.show');
    Route::get('/{id}/edit', [PenjualanController::class, 'edit']);
    Route::put('/{id}', [PenjualanController::class, 'update']);
    Route::get('/{id}/edit_ajax', [PenjualanController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [PenjualanController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [PenjualanController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [PenjualanController::class, 'delete_ajax']);
    Route::get('/{id}/show_ajax', [PenjualanController::class, 'show_ajax']);
    Route::delete('/{id}', [PenjualanController::class, 'destroy']);
});

// Penjualan Detail Routes
Route::group(['prefix' => 'penjualan-detail'], function () {
    Route::get('/', [PenjualanDetailController::class, 'index'])->name('penjualan-detail.index');
    Route::post('/list', [PenjualanDetailController::class, 'list']);
    Route::get('/create', [PenjualanDetailController::class, 'create'])->name('penjualan-detail.create');
    Route::post('/', [PenjualanDetailController::class, 'store'])->name('penjualan-detail.store');
    Route::get('/create_ajax', [PenjualanDetailController::class, 'create_ajax']);
    Route::post('/ajax', [PenjualanDetailController::class, 'store_ajax']);
    Route::get('/{id}', [PenjualanDetailController::class, 'show']);
    Route::get('/{id}/edit', [PenjualanDetailController::class, 'edit']);
    Route::put('/{id}', [PenjualanDetailController::class, 'update']);
    Route::get('/{id}/edit_ajax', [PenjualanDetailController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [PenjualanDetailController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [PenjualanDetailController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [PenjualanDetailController::class, 'delete_ajax']);
    Route::delete('/{id}', [PenjualanDetailController::class, 'destroy']);
    Route::get('/{id}/show_ajax', [PenjualanDetailController::class, 'show_ajax']);
});

    // Validasi pola parameter 'id' agar hanya berupa angka
    Route::pattern('id', '[0-9]+');

    // Route untuk login
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'postlogin']);
    Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

    // Group route yang memerlukan autentikasi
    Route::middleware(['auth'])->group(function () {
        // Masukkan semua route yang perlu autentikasi di sini
    });

    Route::middleware(['auth'])->group(function() {
        // Artinya semua route di dalam group ini harus login dulu
        Route::get('/', [WelcomeController::class, 'index']);
        
        // Route Level - Artinya semua route di dalam group ini harus punya role ADM (Administrator)
        Route::middleware(['authorize:ADM'])->group(function() {
            Route::get('/level', [LevelController::class, 'index']);
            Route::post('/level/list', [LevelController::class, 'list']); // Untuk list JSON datatables
            Route::get('/level/create', [LevelController::class, 'create']);
            Route::post('/level', [LevelController::class, 'store']);
            Route::get('/level/{id}/edit', [LevelController::class, 'edit']); // Untuk tampilkan form edit
            Route::put('/level/{id}', [LevelController::class, 'update']); // Untuk proses update data
            Route::delete('/level/{id}', [LevelController::class, 'destroy']); // Untuk proses hapus data
        });
    });
    