<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\riwayatPendidikanController;

Route::get('/', function () {
    return view('home');
});
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
Route::get('/mahasiswa/update/{id}', [MahasiswaController::class, 'edit']);
Route::post('/mahasiswa/update/{id}', [MahasiswaController::class, 'update']);
Route::get('/mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy']);

Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/create', [ProdukController::class, 'create']);
Route::post('/produk', [ProdukController::class, 'store']);
Route::get('/produk/update/{id}', [ProdukController::class, 'edit']);
Route::post('/produk/update/{id}', [ProdukController::class, 'update']);
Route::get('/produk/delete/{id}', [ProdukController::class, 'destroy']);

Route::get('/riwayat-pendidikan/{mhs_id}', [riwayatPendidikanController::class, 'index']);
Route::get('/riwayat-pendidikan/{mhs_id}/create', [riwayatPendidikanController::class, 'create']);
Route::post('/riwayat-pendidikan/{mhs_id}', [riwayatPendidikanController::class, 'store']);
Route::get('/riwayat-pendidikan/{mhs_id}/update/{id}', [riwayatPendidikanController::class, 'edit']);
Route::post('/riwayat-pendidikan/{mhs_id}/update/{id}', [riwayatPendidikanController::class, 'update']);
Route::get('/riwayat-pendidikan/{mhs_id}/delete/{id}', [riwayatPendidikanController::class, 'destroy']);
