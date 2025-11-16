@extends('layouts.admin')
@section('title', 'Edit Lokasi')

@section('content')
<div class="container py-4">
    <div class="row g-4">

        <!-- Kolom Kiri: Form Edit Lokasi -->
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-0">
                <div class="card-body">
                    <h5 class="text-primary fw-semibold mb-3">
                        <i class="fa-solid fa-pen-to-square me-2"></i> Edit Lokasi
                    </h5>

                    <form action="{{ route('lokasi.update', $lokasiEdit->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama_lokasi" class="form-label fw-semibold">Nama Lokasi</label>
                            <input
                                type="text"
                                name="nama_lokasi"
                                id="nama_lokasi"
                                class="form-control rounded-0"
                                placeholder="Masukkan nama lokasi"
                                value="{{ old('nama_lokasi', $lokasiEdit->nama_lokasi) }}"
                                required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-sm">
                                <i class="fa-solid fa-floppy-disk me-1"></i> Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Tabel Lokasi -->
        <div class="col-md-8">
            <div class="card shadow border-0 rounded-0">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="text-primary fw-semibold mb-0">
                            <i class="fa-solid fa-location-dot me-2"></i> Data Lokasi
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
                                    <th>Nama Lokasi</th>
                                    <th style="width:20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($lokasi as $l)
                                    <tr @if ($l->id == $lokasiEdit->id) class="table-warning" @endif>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $l->nama_lokasi }}</td>
                                        <td>
                                            <a href="{{ route('lokasi.edit', $l->id) }}"
                                               class="btn btn-outline-warning btn-sm rounded me-1">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <form action="{{ route('lokasi.destroy', $l->id) }}" method="POST"
                                                  class="d-inline">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger btn-sm rounded-sm"
                                                        onclick="return confirm('Yakin dihapus?')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">
                                            <i class="fa-regular fa-folder-open me-1"></i> Belum ada data lokasi
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
