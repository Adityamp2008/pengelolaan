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
    <table class="table table-bordered">
    <thead>
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
        @forelse($peminjaman as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->inventaris->nama_barang ?? '-' }}</td>
                <td>{{ $item->tanggal_pinjam }}</td>
                <td>{{ $item->tanggal_kembali }}</td>
                <td>
                    @if ($item->status == 'menunggu')
                        <span class="badge bg-warning text-dark">Menunggu Verifikasi</span>
                    @elseif ($item->status == 'disetujui')
                        <span class="badge bg-success">Disetujui</span>
                    @elseif ($item->status == 'ditolak')
                        <span class="badge bg-danger">Ditolak</span>
                    @elseif ($item->status == 'selesai')
                        <span class="badge bg-primary">Selesai</span>
                    @else
                        <span class="badge bg-secondary">-</span>
                    @endif
                </td>
                <td>
                    @if ($item->status == 'disetujui')
                        Barang sedang dipinjam
                    @elseif ($item->status == 'selesai')
                        Barang sudah dikembalikan
                    @elseif ($item->status == 'ditolak')
                        Peminjaman tidak disetujui
                    @else
                        Menunggu verifikasi petugas
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada riwayat peminjaman.</td>
            </tr>
        @endforelse
    </tbody>
</table>

</div>
@endsection
