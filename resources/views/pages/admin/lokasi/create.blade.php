@extends('layouts.admin')
@section('title', 'Tambah Lokasi')

@section('content')
<div class="container py-4">
    <h3 class="mb-3">Tambah Lokasi</h3>

    <form action="{{ route('lokasi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Lokasi</label>
            <input type="text" name="nama_lokasi" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
