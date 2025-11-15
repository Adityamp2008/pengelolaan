@extends('layouts.petugas')

@section('title', 'Tambah Inventaris')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h4 class="fw-semibold text-primary mb-4">Tambah Barang Inventaris</h4>

            <form action="{{ route('inventari.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Barang <span class="text-danger">*</span></label>
                        <input type="text" name="nama_barang" class="form-control text-dark" placeholder="Masukkan nama barang" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tanggal Perolehan</label>
                        <input type="date" name="tanggal_perolehan" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select name="kategori_id" class="form-select text-dark" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Lokasi <span class="text-danger">*</span></label>
                        <select name="lokasi_id" class="form-select text-dark" required>
                            <option value="">-- Pilih Lokasi --</option>
                            @foreach ($lokasi as $l)
                                <option value="{{ $l->id }}">{{ $l->nama_lokasi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kondisi</label>
                        <select name="kondisi" class="form-select text-dark">
                            <option value="Baik">Baik</option>
                            <option value="Rusak Ringan">Rusak Ringan</option>
                            <option value="Rusak Berat">Rusak Berat</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select text-dark">
                            <option value="Tersedia">Tersedia</option>
                            <option value="Dipinjam">Dipinjam</option>
                            <option value="Rusak">Rusak</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('inventari.index') }}" class="btn btn-secondary text-dark me-2">
                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-save me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
