<?php

use App\Http\Controllers\DaftarCucianController;
use App\Http\Controllers\DaftarLayananController;
use App\Http\Controllers\DaftarPaketController;
use App\Http\Controllers\DaftarPenggunaController;
use App\Http\Controllers\LaundryUserController;
use App\Http\Controllers\PengambilanController;
use App\Http\Controllers\PengantaranController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\RiwayatLaundryUserController;
use App\Http\Controllers\TentangKamiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
}); 

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:user']], function(){
    Route::resource('laundry', LaundryUserController::class);
    Route::resource('riwayat-laundry', RiwayatLaundryUserController::class);
    Route::resource('tentang-kami', TentangKamiController::class);
});
Route::group(['middleware' => ['role:admin']], function(){
    Route::resource('daftar-cucian', DaftarCucianController::class);
    Route::resource('daftar-layanan', DaftarLayananController::class);
    Route::resource('daftar-pengguna', DaftarPenggunaController::class);
    Route::resource('daftar-paket', DaftarPaketController::class);
    Route::resource('pengaturan', PengaturanController::class);
});
Route::group(['middleware' => ['role:kurir']], function(){
    Route::resource('pengambilan', PengambilanController::class);
    Route::resource('pengantaran', PengantaranController::class);
});