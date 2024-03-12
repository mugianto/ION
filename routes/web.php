<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Belakang\BelakangController;
use App\Http\Controllers\Depan\ArtikelController;
use App\Http\Controllers\Depan\BerandaController;
use App\Http\Controllers\Belakang\KategoriController;
use App\Http\Controllers\Belakang\PenggunaController;
use App\Http\Controllers\Belakang\CmanController;

Route::get('/', [BerandaController::class, 'berandanya'])->name('beranda');

// Route Untuk Ion Depan 
Route::get('/artikel',                  [ArtikelController::class, 'indexnya'])->name('l_artikel');
Route::get('/artikel/{slug}',           [ArtikelController::class, 'detailnya'])->name('l_artikel.detail');
Route::get('/kategori/{slug_kategori}', [ArtikelController::class, 'kategorinya'])->name('l_artikel.kategori');
Route::get('/penulis/{slug_penulis}',   [ArtikelController::class, 'penulisnya'])->name('l_artikel.penulis');
// Route Untuk Ion Depan 

// Authentication Routes 
Auth::routes();

Route::middleware(['auth', 'get.user.role'])->group(function () {
    // Route yang memerlukan otentikasi dan middleware GetUserRole

    // Route untuk cman, index cman
    Route::get('/cman', [CmanController::class, 'index'])->name('home'); 

    // Route untuk bagan Artikel
    Route::resource('/cman/artikel', BelakangController::class); 
    Route::put('/cman/artikel/restore/{id}', [BelakangController::class, 'restore'])->name('artikel.restore');
    Route::delete('/cman/artikel/force-destroy/{id}', [BelakangController::class, 'forceDestroy'])->name('artikel.force-destroy');

    // Route untuk bagan Kategori
    Route::resource('/cman/kategori', KategoriController::class);
    Route::resource('/cman/pengguna', PenggunaController::class);

    Route::get('/cman/pengguna/konfirm/{pengguna}', [PenggunaController::class, 'konfirm'])->name('pengguna.konfirm');
});

// Route::middleware(['auth'])->group(function () {
//     // Route yang memerlukan otentikasi //

//     // Route untuk cman, index cman //
//     Route::get('/cman', [CmanController::class, 'index'])->name('home'); 

//     // Route untuk bagan Artikel //
//     Route::resource('/cman/artikel', BelakangController::class); 
//     Route::put('/cman/artikel/restore/{id}', [BelakangController::class, 'restore'])->name('artikel.restore');
//     Route::delete('/cman/artikel/force-destroy/{id}', [BelakangController::class, 'forceDestroy'])->name('artikel.force-destroy');

//     // Route untuk bagan Kategori //
//     Route::resource('/cman/kategori', KategoriController::class);
//     Route::resource('/cman/pengguna', PenggunaController::class);

//     Route::get('/cman/pengguna/konfirm/{pengguna}', [PenggunaController::class, 'konfirm'])->name('pengguna.konfirm');
    
// });

