<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Halaman\DatabarangController;
use App\Http\Controllers\Halaman\HistoryController;
use App\Http\Controllers\Halaman\HomeController;
use App\Http\Controllers\Halaman\LelangController;
use App\Http\Controllers\Halaman\PenawaranCotroller;
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

Route::get('/', function () {
    return view('AUth.login');
})->name('login');
Route::post('/auth',[LoginController::class,'auth'])->name('auth');


Route::prefix('lelang')->middleware('auth:petugas,masyarakat')->group(function(){
    Route::get('/',[HomeController::class, 'index'])->name('home');
    Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
    Route::resource('data_barang',DatabarangController::class);
    Route::resource('penawaran',PenawaranCotroller::class);
    Route::resource('barang_lelang',LelangController::class);
   
});
