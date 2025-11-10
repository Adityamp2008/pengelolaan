@extends('layouts.admin')
@section('title', 'Data Kategori')

@section('content')
<div class="container py-4">
    <h3 class="mb-3">Data Kategori</h3>

    <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">+ Tambah Kategori</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nama_kategori }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" style="display:inline;">
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
