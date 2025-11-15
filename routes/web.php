<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
    //penulisan untuk controller admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\AssetsController;
use App\Http\Controllers\Admin\lokasisController;
use App\Http\Controllers\Admin\AInventarisController;
use App\Http\Controllers\Admin\JadwalController;

    //penulisan untuk petugas
use App\Http\Controllers\Petugas\InventarisController;
use App\Http\Controllers\Petugas\VerifikasiPeminjamanController;
use App\Http\Controllers\petugas\KerusakanController;
use App\Http\Controllers\Petugas\DashboardController as petugasdashboard;

    //penulisan untuk petugas
use App\Http\Controllers\guru\LaporKerusakanController;
use App\Http\Controllers\Guru\DashboardController as gurudashboard;
use Illuminate\Support\Facades\Route;

// === Auth ===
Route::get("/",
    [LoginController::class, "index"])->name("login");
Route::post("/login", 
    [LoginController::class, "loginAction"])->name("login.action",);
Route::post("/logout", 
    [LoginController::class, "logout"])->name("logout");


/*
LOGIN KE ADMIN
*/
Route::group(
    [
        "prefix" => "admin",
        "middleware" => ["auth", "role:admin"],
    ],
    function () {
        Route::get('/dashboard',
             [DashboardController::class, 'index'])->name('admin.dashboard');    
        Route::get('/assets', 
            [AssetsController::class, 'index'])->name('Assets.index');
        Route::post('/assets/{id}/nonaktif', 
            [AssetsController::class, 'nonaktifkan'])->name('Assets.nonaktif');
        Route::post('/assets/{id}/aktif', 
            [AssetsController::class, 'aktifkan'])->name('Assets.aktif');
        Route::get('ainventaris/{id}/hapus', 
            [AInventarisController::class, 'hapusForm'])->name('ainventaris.hapusForm');
        Route::post('/assets/update-status/{id}', 
            [AssetsController::class, 'updateStatus']);


        Route::resource('kategori', KategoriController::class);
        Route::resource('lokasi', lokasisController::class);
        Route::resource('jadwal', JadwalController::class);
        Route::resource('ainventaris', AInventarisController::class);
        
            });

    /*
        Login petugas
    */
    
Route::group(
    [
        "prefix" => "petugas",
        "middleware" => ["auth", "role:petugas"],
    ],
    function () {
    Route::get('/dashboard',
        [petugasdashboard::class, 'index'])->name('petugas.dashboard');

    Route::resource('inventari', InventarisController::class);
        Route::get('verifikasi', 
            [VerifikasiPeminjamanController::class, 'index'])->name('verifikasi.index');
        Route::prefix('verifikasi')->name('petugas.verifikasi.')->group(function () {
        Route::get('/{id}/approve', [VerifikasiPeminjamanController::class, 'approve'])->name('approve');
        Route::get('/{id}/reject', [VerifikasiPeminjamanController::class, 'reject'])->name('reject');
        Route::get('/{id}/selesai', [VerifikasiPeminjamanController::class, 'selesai'])->name('selesai');
        });

        Route::resource('inventaris', InventarisController::class);
        Route::resource('kerusakan', KerusakanController::class);
    });
    
    
    /*
        LOGIN GURU
    */
    Route::group(
        [
            "prefix" => "guru",
            "middleware" => ["auth", "role:guru"],
        ],
        function () {
        Route::get('/dashboard', [gurudashboard::class, 'index'])->name('guru.dashboard');
        Route::resource('laporkerusakan', LaporKerusakanController::class);
        });

require __DIR__ . "/auth.php";
