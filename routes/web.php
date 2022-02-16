<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\LoginController;

Route::group(['prefix'=>'a','middleware'=>['isAdmin','auth']], function(){
    Route::get('home',[HomeController::class, 'index'])->name('a.home');
    Route::resource('member', MemberController::class);
    Route::resource('paket', PaketController::class);
    Route::resource('outlet', OutletController::class);
    Route::get('transaksi',[TransaksiController::class, 'index']);
    Route::get('laporan',[LaporanController::class, 'index']);
});

Route::group(['prefix'=>'k','middleware'=>['isKasir','auth']], function(){
    Route::get('home',[HomeController::class, 'index'])->name('k.home');
    Route::resource('member', MemberController::class);
    Route::resource('paket', PaketController::class);
    Route::get('transaksi',[TransaksiController::class, 'index']);
    Route::get('laporan',[LaporanController::class, 'index']);
});

Route::group(['prefix'=>'o','middleware'=>['isOwner','auth']], function(){
    Route::get('home',[HomeController::class, 'index'])->name('o.home');
    Route::get('laporan',[LaporanController::class, 'index']);
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/', [HomeController::class, 'index']);

// Route::middleware(['auth'])->group(function(){
//     Route::get('home',[HomeController::class,'index']);
// });

// Route::resource('member', MemberController::class);
// Route::resource('paket', PaketController::class);
// Route::resource('outlet', OutletController::class);
