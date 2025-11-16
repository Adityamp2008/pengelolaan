@extends('layouts.admin')

@section('content')
<div class="container">

    <h3 class="mb-4">Data Inventaris (Admin)</h3>

    <a href="{{ route('ainventaris.create') }}" class="btn btn-primary mb-3">
        Tambah Inventaris
    </a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Kondisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ainventaris as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                            <td>{{ $item->lokasi->nama_lokasi ?? '-' }}</td>
                            <td>{{ ucfirst($item->kondisi) }}</td>
                            <td>
                                <a href="{{ route('ainventaris.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">Edit</a>

                                   <a href="{{ route('ainventaris.hapusForm', $item->id) }}" 
                                    class="btn btn-danger btn-sm">Hapus</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
