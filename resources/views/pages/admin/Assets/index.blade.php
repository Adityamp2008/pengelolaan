@extends('layouts.admin')

@section('content')
<div class="container">

    <h3 class="mb-4">Daftar Asset</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Asset</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($assets as $item)
                <tr>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>

                    <td>
                        <span class="badge bg-{{ $item->is_active ? 'success' : 'danger' }}">
                            {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>

                    <td>
                        @if($item->is_active)
                            <form action="{{ route('Assets.nonaktif', $item->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-sm">Nonaktifkan</button>
                            </form>
                        @else
                            <form action="{{ route('Assets.aktif', $item->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-success btn-sm">Aktifkan</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection
