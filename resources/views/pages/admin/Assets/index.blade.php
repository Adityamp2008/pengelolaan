@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Daftar Asset</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm rounded">
        <div class="card-body">

            <table class="table table-bordered table-striped table-hover align-middle ">
                <thead class="table-primary">
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

                            <td class="text-center">

                                <div class="bg-white rounded-pill shadow-sm px-3 py-1 d-inline-flex align-items-center">

                                    <form 
                                        action="{{ $item->is_active ? route('Assets.nonaktif', $item->id) : route('Assets.aktif', $item->id) }}" 
                                        method="POST"
                                        class="m-0"
                                    >
                                        @csrf

                                        <div class="form-check form-switch m-0 p-0">
                                            <input 
                                                class="form-check-input"
                                                type="checkbox"
                                                role="switch"
                                                style="cursor: pointer; width: 40px; height: 20px;"
                                                onChange="this.form.submit()"
                                                {{ $item->is_active ? 'checked' : '' }}
                                            >
                                        </div>

                                    </form>

                                </div>

                            </td>


                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

</div>
@endsection
