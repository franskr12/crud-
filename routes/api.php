<?php

use App\Http\Controllers\API\BarangController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/barang', [ApiBarangController::class, 'index']);
    Route::get('/barang/{id}', [ApiBarangController::class, 'show']);
    Route::post('/barang', [ApiBarangController::class, 'store']);
    Route::put('/barang/{id}', [ApiBarangController::class, 'update']);
    Route::delete('/barang/{id}', [ApiBarangController::class, 'destroy']);
});

