<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\levelController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/home', [HomeController::class, "index"]);

Route::prefix('kategori')->group(function () {
    Route::get('/foodBeverage', [ProdukController::class, 'foodBeverage']);
    Route::get('/beautyHealth', [ProdukController::class, 'beautyHealth']);
    Route::get('/homeCare', [ProdukController::class, 'homeCare']);
    Route::get('/babyKid', [ProdukController::class, 'babyKid']);
});
Route::get('/user/{id}/nama/{name}', [UserController::class, 'ShowUser']);
Route::get('/penjualan', [PenjualanController::class, 'index']);
Route::get('/level', [levelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
Route::post('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);