@extends('layouts.admin')
@section('title', 'Data Kategori')

@section('content')
<div class="container py-4">
    <div class="row g-4">
        <!-- Kolom Kiri: Form Tambah Data -->
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-0">
                <div class="card-body">
                    <h5 class="text-primary fw-semibold mb-3">
                        <i class="fa-solid fa-plus me-2"></i> Tambah Kategori
                    </h5>
                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label fw-semibold">Nama Kategori</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control rounded-0" placeholder="Masukkan nama kategori" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-sm">
                                <i class="fa-solid fa-save me-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Tabel Data -->
        <div class="col-md-8">
            <div class="card shadow border-0 rounded-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="text-primary fw-semibold mb-0">
                            <i class="fa-solid fa-folder-open me-2"></i> Data Kategori
                        </h5>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                            <i class="fa-solid fa-circle-check me-1"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle mb-0 rounded-0">
                            <thead class="table-primary">
                                <tr>
                                    <th style="width:5%">No</th>
                                    <th>Nama Kategori</th>
                                    <th style="width:20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kategori as $k)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $k->nama_kategori }}</td>
                                        <td>
                                            <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-outline-warning btn-sm rounded me-1">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" class="d-inline">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger btn-sm rounded-sm" onclick="return confirm('Yakin dihapus?')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">
                                            <i class="fa-regular fa-folder-open me-1"></i> Belum ada data kategori
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
