@extends('layouts.petugas')

@section('title', 'Data Inventaris')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Data Inventaris</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('inventaris.create') }}" class="btn btn-primary mb-3">+ Tambah Barang</a>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Kondisi</th>
                <th>Status</th>
                <th>Tanggal Perolehan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventaris as $i)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $i->nama_barang }}</td>
                <td>{{ $i->kategori->nama_kategori }}</td>
                <td>{{ $i->lokasi->nama_lokasi }}</td>
                <td>{{ $i->kondisi }}</td>
                <td>{{ $i->status }}</td>
                <td>{{ $i->tanggal_perolehan ? date('d-m-Y', strtotime($i->tanggal_perolehan)) : '-' }}</td>
                <td>
                    <a href="{{ route('inventaris.edit', $i->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('inventaris.destroy', $i->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
