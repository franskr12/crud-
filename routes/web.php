<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;


Route::get('/', function () {
    return view('auth.login'); // Ganti 'auth.login' dengan lokasi view login Anda
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [BarangController::class, 'index'])->name('dashboard');

    Route::resource('barang', BarangController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
