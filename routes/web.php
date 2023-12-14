<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrasiController;
use App\Http\Controllers\Halaman\HomeController;
use App\Http\Controllers\Halaman\LelangController;
use App\Http\Controllers\Halaman\HistoryController;

use App\Http\Controllers\Halaman\PenawaranCotroller;
use App\Http\Controllers\Halaman\DatabarangController;
use App\Http\Controllers\Halaman\DatauserController;

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
    Route::resource('penawaran',PenawaranCotroller::class);
    Route::get('/registrasi',[RegistrasiController::class,'index'])->name('registrasi');
    Route::post('registrasi/user',[RegistrasiController::class,'registrasi_user'])->name('regis_user');
    Route::post('registrasi/petugas',[RegistrasiController::class,'registrasi_petugas'])->name('regis_petugas');
    Route::get('/data_user',[DatauserController::class, 'index'])->name('data_user');
    Route::post('/data_user_delete/{id_user}',[DatauserController::class, 'delete_user'])->name('data_user_delete');
    Route::post('/data_petugas_delete/{id_petugas}',[DatauserController::class, 'delete_petugas'])->name('data_petugas_delete');
    
    Route::middleware('admin:petugas')->group(function(){
        Route::resource('barang_lelang',LelangController::class);
    Route::resource('data_barang',DatabarangController::class);

});
});
