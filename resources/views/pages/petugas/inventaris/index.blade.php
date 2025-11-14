@extends('layouts.petugas')

@section('title', 'Data Inventaris')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0 fw-semibold text-primary">Data Inventaris</h4>
                <a href="{{ route('inventaris.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus me-1"></i> Tambah Barang
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-primary text-center">
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
                        @forelse ($inventaris as $i)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $i->nama_barang }}</td>
                                <td>{{ $i->kategori->nama_kategori }}</td>
                                <td>{{ $i->lokasi->nama_lokasi }}</td>
                                <td>{{ $i->kondisi }}</td>
                                <td>{{ $i->status }}</td>
                                <td class="text-center">
                                    {{ $i->tanggal_perolehan ? date('d-m-Y', strtotime($i->tanggal_perolehan)) : '-' }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('inventaris.edit', $i->id) }}" class="btn btn-outline-warning btn-sm rounded m-1">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('inventaris.destroy', $i->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm rounded m-1">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-3">
                                    Tidak ada data inventaris.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
