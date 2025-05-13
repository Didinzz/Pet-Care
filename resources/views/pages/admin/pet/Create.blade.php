@extends('layout.admin')
@section('title', 'Tambah Hewan Peliharaan')
@section('customer', 'active')
@section('pet', 'active')

@section('content')
    <div class="section-header">
        <h1>Data Hewan Peliharaan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('owner') }}">Hewan Peliharaan</a></div>
            <div class="breadcrumb-item">Tambah</div>
        </div>
    </div>
    <div class="section-body">
        <h4 class="text-dark">Tambah Hewan Peliharaan</h4>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form class="needs-validation" novalidate method="POST" action="{{ route('pet.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Pemilik Hewan</label>
                                <select class="form-control" name="owner_id" required>
                                    <option disabled selected>Pilih Pemilik</option>
                                    @foreach ($owners as $owner)
                                        <option value="{{ $owner->id }}" {{ old('owner_id') == $owner->id ? 'selected' : '' }}>
                                            {{ $owner->nama_lengkap }} - {{ $owner->no_hp }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Pemilik hewan wajib dipilih
                                </div>
                                <x-input-error name="owner_id" />
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Hewan</label>
                                        <input type="text" class="form-control" name="nama_hewan" required
                                            value="{{ old('nama_hewan') }}">
                                        <div class="invalid-feedback">
                                            Nama hewan tidak valid
                                        </div>
                                        <x-input-error name="nama_hewan" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Hewan</label>
                                        <input type="text" class="form-control" name="jenis_hewan" required
                                            value="{{ old('jenis_hewan') }}">
                                        <div class="invalid-feedback">
                                            Jenis hewan tidak valid
                                        </div>
                                        <x-input-error name="jenis_hewan" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ras</label>
                                        <input type="text" class="form-control" name="ras_hewan" required
                                            value="{{ old('ras_hewan') }}">
                                        <div class="invalid-feedback">
                                            Ras hewan tidak valid
                                        </div>
                                        <x-input-error name="ras_hewan" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin" required>
                                            <option disabled selected>Pilih</option>
                                            <option value="Jantan" {{ old('jenis_kelamin') == 'Jantan' ? 'selected' : '' }}>
                                                Jantan</option>
                                            <option value="Betina" {{ old('jenis_kelamin') == 'Betina' ? 'selected' : '' }}>
                                                Betina</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Jenis kelamin tidak valid
                                        </div>
                                        <x-input-error name="jenis_kelamin" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status Vaksinasi</label>
                                        <select class="form-control" name="status_vaksinasi" required>
                                            <option disabled selected>Pilih</option>
                                            <option value="Belum" {{ old('status_vaksinasi') == 'Belum' ? 'selected' : '' }}>
                                                Belum</option>
                                            <option value="Lengkap" {{ old('status_vaksinasi') == 'Lengkap' ? 'selected' : '' }}>
                                                Lengkap</option>
                                            <option value="Perlu Booster" {{ old('status_vaksinasi') == 'Perlu Booster' ? 'selected' : '' }}>
                                                Perlu Booster</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Status vaksinasi tidak valid
                                        </div>
                                        <x-input-error name="status_vaksinasi" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Umur Hewan</label>
                                        <div class="form-row">
                                            <div class="col">
                                                <input type="number" class="form-control" name="umur_tahun"
                                                    placeholder="Tahun" required value="{{ old('umur_tahun') }}">
                                                <small class="form-text text-muted">Isi umur dalam tahun</small>
                                                <div class="invalid-feedback">
                                                    Tahun tidak valid
                                                </div>
                                                <x-input-error name="umur_tahun" />
                                            </div>
                                            <div class="col">
                                                <input type="number" class="form-control" name="umur_bulan"
                                                    placeholder="Bulan" required value="{{ old('umur_bulan') }}">
                                                <small class="form-text text-muted">dalam bulan 0 - 11</small>
                                                <div class="invalid-feedback">
                                                    Bulan tidak valid
                                                </div>
                                                <x-input-error name="umur_bulan" />
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">Umur wajib diisi</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Catatan Khusus</label>
                                <textarea class="form-control" name="catatan_khusus" rows="3" required>{{ old('catatan_khusus') }}</textarea>
                                <div class="invalid-feedback">
                                    Catatan tidak valid
                                </div>
                                <x-input-error name="catatan_khusus" />
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
