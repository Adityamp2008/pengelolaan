<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\lokasisController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Petugas\InventarisController;
use App\Http\Controllers\Admin\AInventarisController;
use App\Http\Controllers\petugas\KerusakanController;
use App\Http\Controllers\guru\LaporKerusakanController;
use App\Http\Controllers\guru\PeminjamanController;
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
        Route::resource('jadwal', JadwalController::class);

        // inventaris admin
        Route::resource('ainventaris', AInventarisController::class);
        // khusus hapusForm
        Route::get('ainventaris/{id}/hapus', [AInventarisController::class, 'hapusForm'])
        ->name('ainventaris.hapusForm');
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
        Route::resouece('peminjaman', PeminjamanController::class);
        });

require __DIR__ . "/auth.php";
