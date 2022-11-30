@extends('layouts.main')

@section('container')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-black">Dashboard</h1>
        <h1 class="h3 mb-0 text-black"><b>Selamat Datang,</b> {{ auth()->user()->name }}</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Total Peminjaman Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Peminjaman</div>
                            <div class="h5 mb-0 font-weight-bold text-black">@convert($peminjaman)</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-cash-coin fa-2x text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Simpanan Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Simpanan</div>
                            <div class="h5 mb-0 font-weight-bold text-black">@convert($simpanan)</div>
                        </div>
                        <div class="col-auto">
                            <i class='bi bi-safe fa-2x text-secondary'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Nasabah Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Nasabah</div>
                            <div class="h5 mb-0 font-weight-bold text-black">{{ $nasabah }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-people-fill fa-2x text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Laporan Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Laporan</div>
                            <div class="h5 mb-0 font-weight-bold">
                                <a href="/laporan" class="text-black">Detail <i class="bi bi-arrow-right nav_icon"></i></a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi-file-earmark-text fa-2x text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @include('chart.line')
        @include('chart.pie')
    </div>
@endsection
