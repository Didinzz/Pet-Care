@extends('layout.admin')
@section('title', 'Edit Dokter')
@section('Dokter', 'active')

@section('content')
    <div class="section-header">
        <h1>Data Dokter Hewan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('dokter') }}">Dokter Hewan</a></div>
            <div class="breadcrumb-item">Edit</div>
        </div>
    </div>
    <div class="section-body">
        <h4 class="text-dark">Edit Dokter Hewan</h4>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form class="needs-validation" novalidate method="POST"
                        action="{{ route('dokter.update', $dokter->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_lengkap"
                                            value="{{ old('nama_lengkap', $dokter->name) }}" required>
                                        <div class="invalid-feedback">
                                            Nama lengkap wajib diisi.
                                        </div>
                                        <x-input-error name="nama_lengkap" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email', $dokter->email) }}" required>
                                        <div class="invalid-feedback">
                                            Email tidak valid.
                                        </div>
                                        <x-input-error name="email" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Biarkan kosong jika tidak ingin mengubah password">
                                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah
                                            password</small>
                                        <x-input-error name="password" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kontak</label>
                                        <input type="text" class="form-control" name="kontak"
                                            value="{{ old('kontak', $dokter->kontak) }}" required>
                                        <div class="invalid-feedback">
                                            Nomor HP wajib diisi.
                                        </div>
                                        <x-input-error name="kontak" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" class="form-control" name="foto" accept="image/*">
                                        @if ($dokter->foto)
                                            <div class="m-2">
                                                <img src="{{ asset('storage/' . $dokter->foto) }}" alt="Foto Dokter"
                                                    class="img-thumbnail" style="max-height: 150px">
                                            </div>
                                        @endif
                                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah foto</small>
                                        <x-input-error name="foto" />
                                    </div>
                                </div>
                                @php
                                    $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                                    $selectedDays = [];
                                    if ($dokter->jadwalPraktik && $dokter->jadwalPraktik->jadwal) {
                                        $selectedDays = is_array($dokter->jadwalPraktik->jadwal)
                                            ? $dokter->jadwalPraktik->jadwal
                                            : json_decode($dokter->jadwalPraktik->jadwal, true);
                                    }
                                    $selectedDays = $selectedDays ?? [];
                                @endphp
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jadwal Praktik</label>
                                        <select class="form-control select2" multiple name="jadwal_praktik[]" required>
                                            @foreach ($days as $d)
                                                <option value="{{ $d }}"
                                                    {{ in_array($d, old('jadwal_praktik', $selectedDays)) ? 'selected' : '' }}>
                                                    {{ $d }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Jadwal praktik wajib dipilih.
                                        </div>
                                        <x-input-error name="jadwal_praktik" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jam Mulai Praktik</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control timepicker" name="jam_mulai"
                                                value="{{ old('jam_mulai', $dokter->jadwalPraktik->jam_mulai ?? '') }}"
                                                required>
                                        </div>
                                        <div class="invalid-feedback">
                                            Jam mulai wajib diisi.
                                        </div>
                                        <x-input-error name="jam_mulai" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jam Selesai Praktik</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control timepicker" name="jam_selesai"
                                                value="{{ old('jam_selesai', $dokter->jadwalPraktik->jam_selesai ?? '') }}"
                                                required>
                                        </div>
                                        <div class="invalid-feedback">
                                            Jam selesai wajib diisi.
                                        </div>
                                        <x-input-error name="jam_selesai" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="3" required>{{ old('alamat', $dokter->alamat) }}</textarea>
                                        <div class="invalid-feedback">
                                            Alamat wajib diisi.
                                        </div>
                                        <x-input-error name="alamat" />
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
