@extends('layouts.petugas')

@section('content')

<h3 class="welcome-text mb-4">
    Selamat datang <span class="text-black fw-bold">{{ Auth()->user()->name }}</span>
</h3>

<div class="row">

    {{-- CARD: Total Barang --}}
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card shadow-sm border-0 rounded-3 position-relative">

            <div class="position-absolute top-0 bottom-0 start-0 bg-primary rounded-start" style="width: 6px;"></div>

            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class="mdi mdi-package-variant-closed text-primary me-3" style="font-size: 32px;"></i>
                    <div>
                        <h6 class="text-muted mb-1">Total Barang</h6>
                        <h4 class="fw-bold mb-0">{{ $totalBarang ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CARD: Total Peminjam --}}
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card shadow-sm border-0 rounded-3 position-relative">

            <div class="position-absolute top-0 bottom-0 start-0 bg-success rounded-start" style="width: 6px;"></div>

            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class="mdi mdi-account-multiple text-success me-3" style="font-size: 32px;"></i>
                    <div>
                        <h6 class="text-muted mb-1">Total Peminjam</h6>
                        <h4 class="fw-bold mb-0">{{ $totalPeminjam ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CARD: Total Laporan Kerusakan --}}
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card shadow-sm border-0 rounded-3 position-relative">

            <div class="position-absolute top-0 bottom-0 start-0 bg-danger rounded-start" style="width: 6px;"></div>

            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class="mdi mdi-alert-circle text-danger me-3" style="font-size: 32px;"></i>
                    <div>
                        <h6 class="text-muted mb-1">Laporan Kerusakan</h6>
                        <h4 class="fw-bold mb-0">{{ $totalLaporan ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CARD: Jadwal Perbaikan --}}
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card shadow-sm border-0 rounded-3 position-relative">

            <div class="position-absolute top-0 bottom-0 start-0 bg-warning rounded-start" style="width: 6px;"></div>

            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class="mdi mdi-calendar-wrench text-warning me-3" style="font-size: 32px;"></i>
                    <div>
                        <h6 class="text-muted mb-1">Jadwal Perbaikan</h6>
                        <h4 class="fw-bold mb-0">{{ $totalPerbaikan ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
