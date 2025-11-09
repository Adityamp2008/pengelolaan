<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController;
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
    });
    
    
    Route::group(
        [
            "prefix" => "guru",
            "middleware" => ["auth", "role:guru"],
        ],
        function () {
        Route::get('/dashboard', [gurudashboard::class, 'index'])->name('guru.dashboard');
        });

require __DIR__ . "/auth.php";
