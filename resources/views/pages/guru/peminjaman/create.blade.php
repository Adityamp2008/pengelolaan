@extends('layouts.guru')
@section('title', 'Ajukan Peminjaman')

@section('content')
<div class="container py-4">
    <h4>Form Peminjaman Barang</h4>

    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Barang</label>
            <select name="inventaris_id" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barang as $b)
                    <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajukan</button>
    </form>
</div>
@endsection
