@extends('layouts.guru')

@section('content')

<h3 class="mb-4">Form Lapor Kerusakan Barang</h3>

<div class="card">
    <div class="card-body">

        <form action="{{ route('laporkerusakan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" class="form-control" value="{{ $inventaris->nama_barang }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text" class="form-control"
                       value="{{ $inventaris->lokasi->nama_lokasi ?? '-' }}" readonly>
            </div>

            <input type="hidden" name="inventaris_id" value="{{ $inventaris->id }}">

            <div class="mb-3">
                <label class="form-label">Deskripsi Kerusakan</label>
                <textarea name="deskripsi_kerusakan" class="form-control"
                          rows="4" required placeholder="Cth: kaki meja patah, engsel longgar..."></textarea>
            </div>

            <button class="btn btn-primary">Kirim Laporan</button>
            <a href="{{ route('laporkerusakan.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection
