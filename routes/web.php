<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('shop', ShopController::class);

Route::resource('barang', BarangController::class)->middleware('auth');
Route::resource('kategori', KategoriController::class);

Route::resource('barangmasuk', BarangMasukController::class);
Route::resource('barangkeluar', BarangKeluarController::class);

Route::get('login', [LoginController::class,'index'])->name('login')->middleware('guest');
#Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'authenticate']);

Route::get('logout', [LoginController::class,'logout']);
Route::post('logout', [LoginController::class,'logout']);

Route::get('register', [RegisterController::class,'create']);
Route::post('register', [RegisterController::class,'store']);