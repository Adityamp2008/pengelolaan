@extends('layouts.guru')

@section('content')
<div class="container">

    <h3 class="mb-4">Lapor Kerusakan Inventaris</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('guru.kerusakan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" value="{{ $inventaris->nama_barang }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lokasi Barang</label>
                    <input type="text" class="form-control" value="{{ $inventaris->lokasi->nama_lokasi ?? '-' }}" readonly>
                </div>

                <input type="hidden" name="inventaris_id" value="{{ $inventaris->id }}">

                <div class="mb-3">
                    <label class="form-label">Deskripsi Kerusakan</label>
                    <textarea name="deskripsi_kerusakan" class="form-control" rows="4" required
                        placeholder="Tuliskan detail kerusakan barang..."></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                <a href="{{ route('guru.inventaris.index') }}" class="btn btn-secondary">Kembali</a>

            </form>
        </div>
    </div>

</div>
@endsection
