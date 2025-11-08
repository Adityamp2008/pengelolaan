<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController;
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
    },
);

require __DIR__ . "/auth.php";
