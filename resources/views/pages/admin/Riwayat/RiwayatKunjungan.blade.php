@extends('layout.admin')
@section('title', 'Riwayat Kunjungan')
@section('riwayat', 'active')

@section('content')
    <div class="section-header">
        <h1>Data Riwayat Kunjungan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Riwayat Kunjungan</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <x-alert />

                    <div class="card-header d-flex justify-content-between">
                        <h4>Data Riwayat Kunjungan</h4>
                        <a href="{{ route('riwayat.create') }}"><button
                                class="btn btn-success btn-lg text-white">Tambah</button></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Dokter</th>
                                        <th>Nama Hewan</th>
                                        <th>Nama Pemilik</th>
                                        <th>Tanggal Kunjungan</th>
                                        <th>Jenis Layanan</th>
                                        <th>Status Kunjungan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($riwayats as $index => $riwayat)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $riwayat->user->name }}</td>
                                            <td>{{ $riwayat->pet->nama_hewan }}</td>
                                            <td>{{ $riwayat->pet->owner->nama_lengkap }}</td>
                                            <td>{{ \Carbon\Carbon::parse($riwayat->tanggal_kunjungan)->translatedFormat('d F') }}
                                            </td>
                                            <td data-toggle="tooltip" title="{{ $riwayat->keterangan ?: '-' }}">
                                                {{ $riwayat->jenis_layanan }}</td>
                                            <td
                                                @if ($riwayat->kunjungan_ulang) data-toggle="tooltip"
                                                title="Kunjungan ulang pada: {{ $riwayat->tanggal_kunjungan_ulang ? \Carbon\Carbon::parse($riwayat->tanggal_kunjungan_ulang)->translatedFormat('d F') : '-' }}" @endif>
                                                {{ $riwayat->kunjungan_ulang ? 'Kunjungan Ulang' : 'Selesai' }}
                                            </td>
                                            <td>
                                                {{-- edit --}}
                                                <a href="{{ route('riwayat.edit', $riwayat->id) }}"
                                                    class="btn btn-warning btn-md"><i class="fas fa-pencil-alt"></i></a>
                                                {{-- delete --}}
                                                <button class="btn btn-danger btn-md"
                                                    onclick="if(confirm('Apakah anda yakin ingin menghapus data ini?')) document.getElementById('delete-form-{{ $riwayat->id }}').submit();">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <form id="delete-form-{{ $riwayat->id }}"
                                                    action="{{ route('riwayat.destroy', $riwayat->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Data tidak tersedia</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
