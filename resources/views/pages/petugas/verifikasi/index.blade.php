@extends('layouts.petugas')

@section('title', 'Verifikasi Peminjaman')
@section('content')
<div class="container py-4">
    <h3 class="mb-3">Daftar Peminjaman Barang</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
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
            @foreach($peminjaman as $data)
                <tr>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->inventaris->nama_barang }}</td>
                    <td>{{ $data->tanggal_pinjam }}</td>
                    <td>{{ $data->tanggal_kembali }}</td>
                    <td>@if($data->status == 'pending' || $data->status == 'menunggu')
    <a href="{{ route('petugas.verifikasi.approve', $data->id) }}" class="btn btn-success btn-sm">Setujui</a>
    <a href="{{ route('petugas.verifikasi.reject', $data->id) }}" class="btn btn-danger btn-sm">Tolak</a>
@elseif($data->status == 'disetujui')
    <span class="badge bg-success">Disetujui</span>
@elseif($data->status == 'ditolak')
    <span class="badge bg-danger">Ditolak</span>
@elseif($data->status == 'selesai')
    <span class="badge bg-secondary">Selesai</span>
@else
    <small>Tidak ada aksi</small>
@endif
</td>
                    <td>
                        @if($data->status == 'pending')
                            <form action="{{ route('verifikasi.update', $data->id) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="status" value="disetujui">
                                <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                            </form>

                            <form action="{{ route('verifikasi.update', $data->id) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="status" value="ditolak">
                                <input type="text" name="keterangan" placeholder="Alasan..." required>
                                <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                            </form>
                        @elseif($data->status == 'disetujui')
                            <form action="{{ route('verifikasi.update', $data->id) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="status" value="selesai">
                                <button type="submit" class="btn btn-secondary btn-sm">Selesai</button>
                            </form>
                        @else
                            <small>Tidak ada aksi</small>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
