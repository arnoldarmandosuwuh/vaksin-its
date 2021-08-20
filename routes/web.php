<?php

use App\Http\Controllers\Admin\JenisVaksinController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\VaksinatorController;
use App\Http\Controllers\DashboardController;
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
    Route::resource('jenis-vaksin', JenisVaksinController::class);
    Route::resource('vaksinator', VaksinatorController::class);
    Route::resource('pegawai', PegawaiController::class);
});

require __DIR__.'/auth.php';
