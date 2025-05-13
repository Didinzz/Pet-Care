@extends('layout.admin')
@section('title', 'Edit Riwayat Kunjungan')
@section('customer', 'active')
@section('riwayat', 'active')

@section('content')
    <div class="section-header">
        <h1>Riwayat Kunjungan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('riwayat') }}">Riwayat Kunjungan</a></div>
            <div class="breadcrumb-item">Edit</div>
        </div>
    </div>
    <div class="section-body">
        <h4 class="text-dark">Edit Riwayat Kunjungan</h4>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form class="needs-validation" novalidate method="POST" action="{{ route('riwayat.update', $riwayat->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dokter</label>
                                        <select class="form-control selectric" name="dokter_id" required>
                                            <option disabled selected>Pilih Dokter</option>
                                            @foreach ($dokters as $dokter)
                                                <option value="{{ $dokter->id }}"
                                                    {{ old('dokter_id', $riwayat->user_id) == $dokter->id ? 'selected' : '' }}>
                                                    {{ $dokter->name }} - {{ $dokter->jadwalPraktik->formatted_jadwal }} - {{ $dokter->jadwalPraktik->formatted_jam }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Dokter wajib dipilih
                                        </div>
                                        <x-input-error name="dokter_id" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hewan Peliharaan</label>
                                        <select class="form-control selectric" name="pet_id" required>
                                            <option disabled selected>Pilih Hewan Peliharaan</option>
                                            @foreach ($pets as $pet)
                                                <option value="{{ $pet->id }}"
                                                    {{ $riwayat->pet_id == $pet->id ? 'selected' : '' }}>
                                                    owner: {{ $pet->owner->nama_lengkap }} - nama: {{ $pet->nama_hewan }} -
                                                    {{ $pet->jenis_hewan }} - vaksinasi: {{ $pet->status_vaksinasi }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Hewan peliharaan wajib dipilih
                                        </div>
                                        <x-input-error name="pet_id" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6" id="tanggalKunjungan">
                                    <div class="form-group">
                                        <label>Tanggal Kunjungan</label>
                                        <input type="text" class="form-control datepicker" name="tanggal_kunjungan"
                                            required value="{{ $riwayat->tanggal_kunjungan }}">
                                        <div class="invalid-feedback">
                                            Tanggal kunjungan tidak valid
                                        </div>
                                        <x-input-error name="tanggal_kunjungan" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Layanan</label>
                                        <select class="form-control selectric" name="jenis_layanan">
                                            <option disabled selected>Pilih Jenis Layanan</option>
                                            @foreach ($jenisLayanan as $layanan)
                                                <option value="{{ $layanan }}"
                                                    {{ $riwayat->jenis_layanan == $layanan ? 'selected' : '' }}>
                                                    {{ $layanan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-input-error name="jenis_layanan" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="control-label">Kunjungan Ulang</div>
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="kunjungan_ulang" class="custom-switch-input"
                                                id="kunjunganUlang" {{ $riwayat->kunjungan_ulang ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Ya</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $riwayat->kunjungan_ulang ? '' : 'd-none' }}" id="tanggalKunjunganUlang">
                                        <label>Tanggal Kunjungan Ulang</label>
                                        <input type="text" class="form-control datepicker" name="tanggal_kunjungan_ulang"
                                            required value="{{ $riwayat->tanggal_kunjungan_ulang }}">
                                        <div class="invalid-feedback">
                                            Tanggal kunjungan tidak valid
                                        </div>
                                        <x-input-error name="tanggal_kunjungan_ulang" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" name="keterangan" rows="3" required>{{ $riwayat->keterangan }}</textarea>
                                        <div class="invalid-feedback">
                                            Keterangan tidak valid
                                        </div>
                                        <x-input-error name="keterangan" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            document.getElementById('kunjunganUlang').addEventListener('change', function() {
                                if (this.checked) {
                                    console.log('checked');
                                    document.getElementById('tanggalKunjunganUlang').classList.remove('d-none');
                                } else {
                                    console.log('unchecked');
                                    document.getElementById('tanggalKunjunganUlang').classList.add('d-none');
                                }
                            });
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>


@endsection

