<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\levelController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\POScontroller;
use App\Http\Controllers\POSTController;
use App\Http\Controllers\stokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Faker\Core\File;
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

Route::get('/', [WelcomeController::class, 'index']);
// Route::get('/index', function () {
//     $index2Content = file_get_contents(public_path('adminlte/index.html'));
//     return $index2Content;
// });
// Route::get('/pages/general', function () {
//     $generalContent = file_get_contents(public_path('adminlte/pages/forms/general.html'));
//     return $generalContent;
// });
// route::get('/home', [HomeController::class, "index"]);
// route::get('/kategori', [KategoriController::class, "index"])->name('kategori.index');

// Route::prefix('kategori')->group(function () {
//     Route::get('/foodBeverage', [ProdukController::class, 'foodBeverage']);
//     Route::get('/beautyHealth', [ProdukController::class, 'beautyHealth']);
//     Route::get('/homeCare', [ProdukController::class, 'homeCare']);
//     Route::get('/babyKid', [ProdukController::class, 'babyKid']);
// });
// Route::get('/user/{id}/nama/{name}', [UserController::class, 'ShowUser']);
// Route::get('/penjualan', [PenjualanController::class, 'index']);
// Route::get('/level', [levelController::class, 'index']);
// Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/tambah', [UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::post('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);
// Route::get('/kategori/create', [KategoriController::class, 'create']);
// Route::post('/kategori/store', [KategoriController::class, 'store']);
// Route::get('/kategori/edit/{id}', [kategoriController::class, 'edit'])->name('kategori.edit');
// Route::post('/kategori/ubah/{id}', [kategoriController::class, 'ubah']);
// Route::get('/kategori/hapus/{id}', [kategoriController::class, 'hapus']);



Route::resource('m_user', POScontroller::class);
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/{id}/edit/', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});
Route::group(['prefix' => 'level'], function () {
    Route::get('/', [levelController::class, 'index']);
    Route::post('/list', [levelController::class, 'list']);
    Route::get('/create', [levelController::class, 'create']);
    Route::post('/', [levelController::class, 'store']);
    Route::get('/show/{id}', [levelController::class, 'show'])->name('level.show');
    Route::get('/{id}/edit/', [levelController::class, 'edit'])->name('level.edit');
    Route::put('/{id}', [levelController::class, 'update'])->name('level.update');
    Route::delete('/{id}', [levelController::class, 'destroy'])->name('level.destroy');
});
Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [kategoriController::class, 'index']);
    Route::post('/list', [kategoriController::class, 'list']);
    Route::get('/create', [kategoriController::class, 'create']);
    Route::post('/', [kategoriController::class, 'store']);
    Route::get('/show/{id}', [kategoriController::class, 'show'])->name('kategori.show');
    Route::get('/{id}/edit/', [kategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/{id}', [kategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/{id}', [kategoriController::class, 'destroy'])->name('kategori.destroy');
});
Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [barangController::class, 'index']);
    Route::post('/list', [barangController::class, 'list'])->name('barang.list');
    Route::get('/create', [barangController::class, 'create']);
    Route::post('/', [barangController::class, 'store']);
    Route::get('/show/{id}', [barangController::class, 'show'])->name('barang.show');
    Route::get('/{id}/edit/', [barangController::class, 'edit'])->name('barang.edit');
    Route::put('/{id}', [barangController::class, 'update'])->name('barang.update');
    Route::delete('/{id}', [barangController::class, 'destroy'])->name('barang.destroy');
});

Route::group(['prefix' => 'stok'], function () {
    Route::get('/', [stokController::class, 'index']);
    Route::post('/list', [stokController::class, 'list'])->name('stok.list');
    Route::get('/create', [stokController::class, 'create']);
    Route::post('/', [stokController::class, 'store']);
    Route::get('/show/{id}', [stokController::class, 'show'])->name('stok.show');
    Route::get('/{id}/edit/', [stokController::class, 'edit'])->name('stok.edit');
    Route::put('/{id}', [stokController::class, 'update'])->name('stok.update');
    Route::delete('/{id}', [stokController::class, 'destroy'])->name('stok.destroy');
});
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses_register');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:1']], function () {
        Route::resource('admin', AdminController::class);
    });
    Route::group(['middleware' => ['cek_login:2']], function () {
        Route::resource('admin', ManagerController::class);
    });
});
Route::get('file-upload', [FileUploadController::class, 'fileUpload']);
Route::post('file-upload', [FileUploadController::class, 'prosesFileUpload']);
