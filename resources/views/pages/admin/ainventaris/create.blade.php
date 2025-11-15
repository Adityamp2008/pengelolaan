@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-body">

        <h4 class="card-title">Tambah Inventaris</h4>

        <form action="{{ route('ainventaris.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="nama_kategori" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Lokasi</label>
                <select name="nama_lokasi" class="form-control" required>
                    <option value="">-- Pilih Lokasi --</option>
                    @foreach($lokasi as $l)
                        <option value="{{ $l->id }}">{{ $l->nama_lokasi }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Kondisi</label>
                <input type="text" name="kondisi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                    <option value="hilang">Hilang</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Tanggal Perolehan</label>
                <input type="date" name="tanggal_perolehan" class="form-control">
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('ainventaris.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection
