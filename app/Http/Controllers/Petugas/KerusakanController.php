<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\Kerusakan;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class KerusakanController extends Controller
{
        public function index()
    {
        if(auth()->user()->role == 'guru'){
            $data = Kerusakan::where('user_id', auth()->id())->get();
        } else {
            $data = Kerusakan::with('user')->get();
        }

        return view('pages.petugas.kerusakan.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'lokasi' => 'required',
            'deskripsi_kerusakan' => 'required',
        ]);

        Kerusakan::create([
            'user_id' => auth()->id(),
            'nama_barang' => $request->nama_barang,
            'lokasi' => $request->lokasi,
            'deskripsi_kerusakan' => $request->deskripsi_kerusakan,
        ]);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $data = Kerusakan::find($id);
        $data->update(['status' => $request->status]);
        return back();
    }

    public function destroy($id)
    {
        Kerusakan::destroy($id);
        return back();
    }

}
