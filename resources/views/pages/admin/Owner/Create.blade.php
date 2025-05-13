@extends('layout.admin')
@section('title', 'Tambah Pelanggan')
@section('customer', 'active')
@section('owner', 'active')

@section('content')
    <div class="section-header">
        <h1>Data Pelanggan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('owner') }}">Pelanggan</a></div>
            <div class="breadcrumb-item">Tambah</div>
        </div>
    </div>
    <div class="section-body">
        <h4 class="text-dark">Tambah Pelanggan</h4>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form class="needs-validation" novalidate="" method="POST" action="{{ route('owner.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" required="" name="name">
                                        <div class="invalid-feedback">
                                            Nama lengkap tidak valid?
                                        </div>
                                        <x-input-error name="name" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Whatsapp</label>
                                        <input type="number" class="form-control" required="" name="no_hp">
                                        <div class="invalid-feedback">
                                            Nomor WA tidak valid
                                        </div>
                                        <x-input-error name="no_hp" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="address" required>
                                        <div class="invalid-feedback">
                                            Alamat tidak valid
                                        </div>
                                        <x-input-error name="address" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Catatan</label>
                                        <textarea class="form-control" required="" name="note"></textarea>
                                        <div class="invalid-feedback">
                                            Catatan tidak valid
                                        </div>
                                        <x-input-error name="note" />
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
