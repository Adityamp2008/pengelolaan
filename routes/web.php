<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Guru\PeminjamanController;
use App\Http\Controllers\Admin\AssetsController;
use App\Http\Controllers\Admin\lokasisController;
use App\Http\Controllers\Petugas\VerifikasiPeminjamanController;
use App\Http\Controllers\Petugas\inventarisController;
use App\Http\Controllers\Admin\InventarissController;
use App\Http\Controllers\Petugas\DashboardController as petugasdashboard;
use App\Http\Controllers\Guru\DashboardController as gurudashboard;
use Illuminate\Support\Facades\Route;

// === Auth ===
Route::get("/", [LoginController::class, "index"])->name("login");
Route::post("/login", [LoginController::class, "loginAction"])->name(
    "login.action",
);
Route::post("/logout", [LoginController::class, "logout"])->name("logout");

/*
LOGIN KE ADMIN
*/
Route::group(
    [
        "prefix" => "admin",
        "middleware" => ["auth", "role:admin"],
    ],
    function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('kategori', KategoriController::class);
        Route::resource('lokasi', lokasisController::class);


            Route::get('/assets', [AssetsController::class, 'index'])->name('Assets.index');

    Route::post('/assets/{id}/nonaktif', [AssetsController::class, 'nonaktifkan'])
        ->name('Assets.nonaktif');

    Route::post('/assets/{id}/aktif', [AssetsController::class, 'aktifkan'])
        ->name('Assets.aktif');
        
       


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
    Route::get('/dashboard', [petugasdashboard::class, 'index'])->name('petugas.dashboard');
    Route::resource('inventari', InventarisController::class);
        Route::get('verifikasi', [VerifikasiPeminjamanController::class, 'index'])->name('verifikasi.index');
    



    //verivikasi

        Route::prefix('verifikasi')->name('petugas.verifikasi.')->group(function () {
            Route::get('/{id}/approve', [VerifikasiPeminjamanController::class, 'approve'])->name('approve');
            Route::get('/{id}/reject', [VerifikasiPeminjamanController::class, 'reject'])->name('reject');
            Route::get('/{id}/selesai', [VerifikasiPeminjamanController::class, 'selesai'])->name('selesai');
        });
    });
    
    
    Route::group(
        [
            "prefix" => "guru",
            "middleware" => ["auth", "role:guru"],
        ],
        function () {
        Route::get('/dashboard', [gurudashboard::class, 'index'])->name('guru.dashboard');
        Route::resource('peminjaman', PeminjamanController::class);
        });

require __DIR__ . "/auth.php";
