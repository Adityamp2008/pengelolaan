@extends('layouts.admin')

@section('content')

<div class="card">
<div class="card shadow-sm border-0">
    <div class="card-body">

        <h4 class="card-title mb-4">Tambah Inventaris</h4>

        <form action="{{ route('ainventaris.store') }}" method="POST">
            @csrf

            <div class="row g-3">

                {{-- Nama Barang --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" required>
                </div>

                {{-- Kategori --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="nama_kategori" class="form-select text-dark" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Lokasi --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Lokasi</label>
                    <select name="nama_lokasi" class="form-select text-dark" required>
                        <option value="">-- Pilih Lokasi --</option>
                        @foreach($lokasi as $l)
                            <option value="{{ $l->id }}">{{ $l->nama_lokasi }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Kondisi --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Kondisi</label>
                    <input type="text" name="kondisi" class="form-control" required>
                </div>

                {{-- Status --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select text-dark" required>
                        <option value="baik">Baik</option>
                        <option value="rusak">Rusak</option>
                        <option value="hilang">Hilang</option>
                    </select>
                </div>

                {{-- Tanggal Perolehan --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Tanggal Perolehan</label>
                    <input type="date" name="tanggal_perolehan" class="form-control">
                </div>

            </div>

            <div class="mt-4">
                <button class="btn btn-success px-4">Simpan</button>
                <a href="{{ route('ainventaris.index') }}" class="btn btn-secondary px-4">Kembali</a>
            </div>

        </form>

    </div>
</div>

</div>

@endsection
