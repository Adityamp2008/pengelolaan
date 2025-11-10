@extends('layouts.admin')
@section('title', 'Edit Lokasi')

@section('content')
<div class="container py-4">
    <h3 class="mb-3">Edit Lokasi</h3>

    <form action="{{ route('lokasi.update', $lokasi->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Lokasi</label>
            <input type="text" name="nama_lokasi" value="{{ $lokasi->nama_lokasi }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
