@extends('layouts.admin')
@section('content')

<h3 class="welcome-text mb-4">
    Selamat datang <span class="text-black fw-bold">{{ Auth()->user()->name }}</span>
</h3>

<div class="row">

    <!-- CARD: Total Kategori -->
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card shadow-sm border-0 rounded-3 position-relative">
            <!-- Left Accent -->
            <div class="position-absolute top-0 bottom-0 start-0 bg-primary rounded-start" style="width: 6px;"></div>

            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="mdi mdi-tag-multiple text-primary" style="font-size: 32px;"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Kategori</h6>
                        <h4 class="fw-bold mb-0">{{ $totalKategori ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CARD: Total Lokasi -->
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card shadow-sm border-0 rounded-3 position-relative">
            <div class="position-absolute top-0 bottom-0 start-0 bg-success rounded-start" style="width: 6px;"></div>

            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="mdi mdi-map-marker text-success" style="font-size: 32px;"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Lokasi</h6>
                        <h4 class="fw-bold mb-0">{{ $totalLokasi ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CARD: Total Inventaris -->
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card shadow-sm border-0 rounded-3 position-relative">
            <div class="position-absolute top-0 bottom-0 start-0 bg-warning rounded-start" style="width: 6px;"></div>

            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="mdi mdi-package-variant text-warning" style="font-size: 32px;"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Inventaris</h6>
                        <h4 class="fw-bold mb-0">{{ $totalInventaris ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CARD: Jadwal Perbaikan -->
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card shadow-sm border-0 rounded-3 position-relative">
            <div class="position-absolute top-0 bottom-0 start-0 bg-danger rounded-start" style="width: 6px;"></div>

            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="mdi mdi-calendar-wrench text-danger" style="font-size: 32px;"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Jadwal Perbaikan</h6>
                        <h4 class="fw-bold mb-0">{{ $totalJadwal ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
