@extends('layout.admin')
@section('title', 'Tambah Dokter')
@section('Dokter', 'active')

@section('content')
    <div class="section-header">
        <h1>Data Dokter Hewan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('owner') }}">Dokter Hewan</a></div>
            <div class="breadcrumb-item">Tambah</div>
        </div>
    </div>
    <div class="section-body">
        <h4 class="text-dark">Tambah Dokter Hewan</h4>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form class="needs-validation" novalidate method="POST" action="{{ route('dokter.store') }}">
                        @csrf
                        <div class="card-body">

                            <div class="form-row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_lengkap"
                                            value="{{ old('nama_lengkap') }}" required>
                                        <div class="invalid-feedback">
                                            Nama lengkap wajib diisi.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email') }}" required>
                                        <div class="invalid-feedback">
                                            Email tidak valid.
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                        <div class="invalid-feedback">
                                            Password wajib diisi.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No HP</label>
                                        <input type="text" class="form-control" name="no_hp"
                                            value="{{ old('no_hp') }}" required>
                                        <div class="invalid-feedback">
                                            Nomor HP wajib diisi.
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
