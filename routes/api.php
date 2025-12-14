<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;

// ------------------- AUTH -------------------
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

Route::get('/profile',  [AuthController::class, 'profile']);
Route::post('/refresh', [AuthController::class, 'refresh']);
Route::post('/logout',  [AuthController::class, 'logout']);

// ------------------- PRODUK CRUD -------------------
Route::post('/produk/create',        [ProdukController::class, 'create']);
Route::get('/produk/read',           [ProdukController::class, 'read']);
Route::get('/produk/read/{id}',      [ProdukController::class, 'show']);
Route::put('/produk/update/{id}',    [ProdukController::class, 'update']);
Route::delete('/produk/delete/{id}', [ProdukController::class, 'delete']);

// ------------------- KATEGORI CRUD -------------------
Route::post('/kategori/create',        [KategoriController::class, 'create']);
Route::get('/kategori/read',           [KategoriController::class, 'read']);
Route::get('/kategori/read/{id}',      [KategoriController::class, 'show']);
Route::put('/kategori/update/{id}',    [KategoriController::class, 'update']);
Route::delete('/kategori/delete/{id}', [KategoriController::class, 'delete']);

// ------------------- PELANGGAN CRUD -------------------
Route::post('/pelanggan/create',        [PelangganController::class, 'create']);
Route::get('/pelanggan/read',           [PelangganController::class, 'read']);
Route::get('/pelanggan/read/{id}',      [PelangganController::class, 'show']);
Route::put('/pelanggan/update/{id}',    [PelangganController::class, 'update']);
Route::delete('/pelanggan/delete/{id}', [PelangganController::class, 'delete']);
});
