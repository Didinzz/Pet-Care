@extends('layout.admin')
@section('title', 'Dokter Hewan')
{{-- @section('customer', 'active') --}}
@section('Dokter', 'active')

@section('content')
    <div class="section-header">
        <h1>Data Dokter Hewan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Dokter Hewan</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <x-alert />

                    <div class="card-header d-flex justify-content-between">
                        <h4>Data Dokter Hewan</h4>
                        <a href="{{ route('dokter.create') }}"><button
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
                                        <th>Foto</th>
                                        <th>Nama Dokter</th>
                                        <th>Kontak</th>
                                        <th>Jadwal</th>
                                        <th>Jam Praktik</th>
                                        <th>Alamat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($dokters as $index => $dokter)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td> <img alt="image" src="{{ asset('storage/' . $dokter->foto) }}"
                                                    class="rounded-circle" width="35" data-toggle="tooltip"
                                                    title="{{ $dokter->name }}"></td>
                                            <td>{{ $dokter->name }}</td>
                                            <td>{{ $dokter->kontak }}</td>
                                            <td>
                                                {{ $dokter->jadwalPraktik ? $dokter->jadwalPraktik->formatted_jadwal : '-' }}
                                            </td>
                                            <td>
                                                {{ $dokter->jadwalPraktik ? $dokter->jadwalPraktik->formatted_jam : '-' }}
                                            </td>
                                            <td>{{ $dokter->alamat }}</td>
                                            <td>
                                                {{-- edit --}}
                                                <a href="{{ route('dokter.edit', $dokter->id) }}"
                                                    class="btn  btn-warning btn-md"><i class="fas fa-pencil-alt"></i></a>
                                                {{-- delete --}}
                                                <button class="btn btn-danger btn-md"
                                                    data-confirm="Hapus?|Apakah anda ingin menghapus data ini?"
                                                    data-confirm-yes="document.getElementById('delete-form-{{ $dokter->id }}').submit();">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <form id="delete-form-{{ $dokter->id }}"
                                                    action="{{ route('dokter.destroy', $dokter->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Data tidak tersedia</td>
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
