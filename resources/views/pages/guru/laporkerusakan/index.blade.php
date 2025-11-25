@extends('layouts.guru')

@section('content')

<h3 class="mb-4">Daftar Inventaris Rusak</h3>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Lokasi</th>
            <th>Kondisi</th>
            <th>Tanggal Input</th>
            <th>Lapor Kerusakan</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($inventaris as $item)
        <tr>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->lokasi->nama_lokasi ?? '-' }}</td>
            <td><span class="badge bg-danger">{{ $item->kondisi }}</span></td>
            <td>{{ $item->tanggal_perolehan ? date('d-m-Y', strtotime($item->tanggal_perolehan)) : '-' }}</td>

            <td>
                <a href="{{ route('laporkerusakan.create', ['inventaris_id' => $item->id]) }}"
                   class="btn btn-danger btn-sm">
                    Lapor Kerusakan
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
