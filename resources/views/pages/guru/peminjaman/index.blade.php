@extends('layouts.guru')
@section('title', 'Riwayat Peminjaman')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Riwayat Peminjaman Saya</h3>

    {{-- Tombol Tambah --}}
    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary mb-3">
        + Ajukan Peminjaman
    </a>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabel Data --}}
    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($peminjaman as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->inventaris->nama_barang }}</td>
                    <td>{{ $item->tanggal_pinjam }}</td>
                    <td>{{ $item->tanggal_kembali }}</td>
                    <td>
                        @if ($item->status == 'Menunggu')
                            <span class="badge bg-warning text-dark">Menunggu Verifikasi</span>
                        @elseif ($item->status == 'Dipinjam')
                            <span class="badge bg-primary">Dipinjam</span>
                        @elseif ($item->status == 'Dikembalikan')
                            <span class="badge bg-success">Dikembalikan</span>
                        @elseif ($item->status == 'Ditolak')
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>
                    <td>{{ $item->keterangan ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada pengajuan peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
