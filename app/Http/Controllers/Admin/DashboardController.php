<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventaris;
use App\Models\Kategori;
use App\Models\lokasi;
use App\Models\JadwalPerbaikan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalKategori = Kategori::count();
        $totalLokasi = Lokasi::count();
        $totalInventaris = Inventaris::count();
        $totalJadwal = JadwalPerbaikan::count();
        return view('pages.admin.dashboard',
            compact(
                'totalKategori',
                'totalLokasi',
                'totalInventaris',
                'totalJadwal',
            ));
    }
}
