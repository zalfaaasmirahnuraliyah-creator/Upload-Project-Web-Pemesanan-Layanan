<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;

Route::get('/', [LayananController::class, 'index']);
Route::resource('layanans', LayananController::class);
Route::resource('pelanggans', PelangganController::class);
Route::resource('pemesanans', PemesananController::class);
Route::patch('/pemesanans/{id}/status', [App\Http\Controllers\PemesananController::class, 'updateStatus'])->name('pemesanans.updateStatus');