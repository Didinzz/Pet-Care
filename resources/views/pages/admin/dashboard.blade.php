@extends('layout.admin')
@section('title', 'Dashboard')
@section('dashboard', 'active')
@section('content')
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary d-flex align-items-center justify-content-center">
                    <i class="fas fa-user-md"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Dokter</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalDokter?? 0 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger d-flex align-items-center justify-content-center">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Pelanggan</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalPelanggan?? 0 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning d-flex align-items-center justify-content-center">
                    <i class="fas fa-paw"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Hewan</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalHewan?? 0 }} 
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info d-flex align-items-center justify-content-center">
                    <i class="fas fa-history"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Kunjungan</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalKunjungan?? 0 }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('pages.admin.Dashboard.KunjunganPerbulanChart')
        @include('pages.admin.Dashboard.JenisLayananChart')
    </div>


@endsection
