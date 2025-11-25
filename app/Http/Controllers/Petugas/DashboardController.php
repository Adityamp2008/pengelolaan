<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Inventaris;
use App\Models\Peminjaman;
use App\Models\Kerusakan;
use App\Models\pemeliharaan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
public function index()
{
    return view('pages.petugas.dashboard', [
        'totalBarang'     => Inventaris::count(),
        'totalPeminjam'   => Peminjaman::where('status', 'dipinjam')->count(),
        'totalLaporan'    => Kerusakan::count(),
        'totalPerbaikan'  => Pemeliharaan::count(),
    ]);
}

}
