@extends('layouts.petugas')

@section('title', 'Tambah Inventaris')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Tambah Barang Inventaris</h3>

    <form action="{{ route('inventaris.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <select name="lokasi_id" class="form-select" required>
                <option value="">-- Pilih Lokasi --</option>
                @foreach ($lokasi as $l)
                    <option value="{{ $l->id }}">{{ $l->nama_lokasi }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Kondisi</label>
            <select name="kondisi" class="form-select">
                <option value="Baik">Baik</option>
                <option value="Rusak Ringan">Rusak Ringan</option>
                <option value="Rusak Berat">Rusak Berat</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="Tersedia">Tersedia</option>
                <option value="Dipinjam">Dipinjam</option>
                <option value="Rusak">Rusak</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Perolehan</label>
            <input type="date" name="tanggal_perolehan" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('inventaris.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
