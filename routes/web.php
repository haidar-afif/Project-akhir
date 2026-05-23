<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\AntreanController;
use App\Http\Controllers\AdminController;

// Halaman Utama Admin (Dashboard & Scan QR)
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin/scan', [AdminController::class, 'scan'])->name('admin.scan');
// Halaman Pelanggan
Route::get('/', [AntreanController::class, 'create'])->name('pelanggan.ambil'); // Kita jadikan halaman utama (/)
Route::post('/ambil-antrean', [AntreanController::class, 'store'])->name('pelanggan.store');
Route::get('/cetak-antrean/{id}', [AntreanController::class, 'cetak'])->name('pelanggan.cetak');
// Halaman Kelola Layanan Admin
Route::get('/admin/layanan', [LayananController::class, 'index'])->name('admin.layanan');
Route::post('/admin/layanan', [LayananController::class, 'store'])->name('admin.layanan.store');
Route::delete('/admin/layanan/{id}', [LayananController::class, 'destroy'])->name('admin.layanan.destroy');
Route::get('/lihat-antrean', [AntreanController::class, 'lihat'])->name('pelanggan.lihat');
