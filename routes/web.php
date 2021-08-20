<?php

use App\Http\Controllers\Admin\JadwalVaksinasiController;
use App\Http\Controllers\Admin\JenisVaksinController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\VaksinatorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Pegawai\JadwalVaksinController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/',[DashboardController::class, 'index'])->name('dashboard');

    // Route Admin
    Route::resource('jenis-vaksin', JenisVaksinController::class);
    Route::resource('vaksinator', VaksinatorController::class);
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('jadwal-vaksinasi', JadwalVaksinasiController::class);
    Route::put('laporan/hadir/{id}', [LaporanController::class, 'hadir'])->name('laporan.hadir');
    Route::put('laporan/tidak-hadir/{id}', [LaporanController::class, 'tidakHadir'])->name('laporan.tidak-hadir');
    Route::resource('laporan', LaporanController::class);
    
    // Route Pegawai
    Route::resource('jadwal-vaksin', JadwalVaksinController::class);
});

require __DIR__.'/auth.php';
