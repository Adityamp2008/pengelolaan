@extends('layouts.petugas')
@section('content')

<h3>Laporan Kerusakan</h3>

@if(auth()->user()->role == 'guru')
<!-- GURU / SISWA bisa lapor -->
<form action="{{ route('laporkerusakan.store') }}" method="POST" class="card p-3 mb-4">
    @csrf
    <input type="text" name="nama_barang" placeholder="Nama barang" class="form-control mb-2" required>
    <input type="text" name="lokasi" placeholder="Lokasi" class="form-control mb-2" required>
    <textarea name="deskripsi_kerusakan" placeholder="Deskripsi kerusakan" class="form-control mb-2" required></textarea>
    <button class="btn btn-primary">Kirim Laporan</button>
</form>
@endif


<table class="table">
    <tr>
        <th>Pelapor</th>
        <th>Barang</th>
        <th>Lokasi</th>
        <th>Deskripsi</th>
        <th>Status</th>
        @if(auth()->user()->role == 'admin')<th>Aksi</th>@endif
    </tr>

    @foreach($data as $item)
    <tr>
        <td>{{ $item->user->name }}</td>
        <td>{{ $item->nama_barang }}</td>
        <td>{{ $item->nama_lokasi ?? $item->lokasi ?? '-' }}</td>
        <td>{{ $item->deskripsi_kerusakan }}</td>
        <td>
            @if(auth()->user()->role == 'admin')
                <form action="{{ route('kerusakan.update',$item->id) }}" method="POST">
                    @csrf @method('PUT')
                    <select name="status" onchange="this.form.submit()">
                        <option {{ $item->status=='Tertunda'?'selected':'' }}>Tertunda</option>
                        <option {{ $item->status=='Diproses'?'selected':'' }}>Diproses</option>
                        <option {{ $item->status=='Selesai'?'selected':'' }}>Selesai</option>
                    </select>
                </form>
            @else
                {{ $item->status }}
            @endif
        </td>

        @if(auth()->user()->role == 'admin')
        <td>
            <form action="{{ route('laporkerusakan.delete', $item->id) }}" method="POST">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
        @endif
    </tr>
    @endforeach
</table>

@endsection
