@extends('layouts.petugas')

@section('title', 'Verifikasi Peminjaman')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0 text-dark">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-semibold text-primary mb-0">Daftar Peminjaman Barang</h4>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered align-middle text-dark">
                    <thead class="table-light text-center">
                        <tr>
                            <th>Nama Peminjam</th>
                            <th>Barang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peminjaman as $data)
                            <tr>
                                <td>{{ $data->user->name }}</td>
                                <td>{{ $data->inventaris->nama_barang }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($data->tanggal_pinjam)->format('d-m-Y') }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($data->tanggal_kembali)->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    @if($data->status == 'pending')
                                        <span class="badge bg-warning text-dark">Menunggu Verifikasi</span>
                                    @elseif($data->status == 'disetujui')
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif($data->status == 'ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @elseif($data->status == 'selesai')
                                        <span class="badge bg-secondary">Selesai</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($data->status == 'pending')
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('petugas.verifikasi.approve', $data->id) }}" class="btn btn-outline-success btn-sm">
                                                <i class="fa-solid fa-check"></i> Setujui
                                            </a>
                                            <a href="{{ route('petugas.verifikasi.reject', $data->id) }}" class="btn btn-outline-danger btn-sm">
                                                <i class="fa-solid fa-xmark"></i> Tolak
                                            </a>
                                        </div>
                                    @elseif($data->status == 'disetujui')
                                        <a href="{{ route('petugas.verifikasi.selesai', $data->id) }}" class="btn btn-outline-secondary btn-sm">
                                            <i class="fa-solid fa-flag-checkered"></i> Selesai
                                        </a>
                                    @else
                                        <small class="text-muted">Tidak ada aksi</small>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-3">
                                    Tidak ada data peminjaman.
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
