<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $inventaris = Inventaris::count();
        return view('pages.admin.dashboard', compact('inventaris'));
    }
}
