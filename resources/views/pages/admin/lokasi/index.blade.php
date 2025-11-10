@extends('layouts.admin')
@section('title', 'Data Lokasi')

@section('content')
<div class="container py-4">
    <h3 class="mb-3">Data Lokasi</h3>

    <a href="{{ route('lokasi.create') }}" class="btn btn-primary mb-3">+ Tambah Lokasi</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lokasi as $l)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $l->nama_lokasi }}</td>
                    <td>
                        <a href="{{ route('lokasi.edit', $l->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('lokasi.destroy', $l->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin dihapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
