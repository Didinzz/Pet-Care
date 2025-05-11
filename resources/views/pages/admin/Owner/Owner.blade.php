@extends('layout.admin')
@section('title', 'Pelanggan')
@section('customer', 'active')
@section('owner', 'active')

@section('content')
    <div class="section-header">
        <h1>Data Pelanggan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Pelanggan</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <x-alert />

                    <div class="card-header d-flex justify-content-between">
                        <h4>Data Pelanggan</h4>
                        <a href="{{ route('owner.create') }}"><button class="btn btn-success btn-lg text-white">Tambah</button></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Nama Lengkap</th>
                                        <th>Whatsapp</th>
                                        <th>Alamat</th>
                                        <th>Catatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($owner as $index => $ownerData)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $ownerData->nama_lengkap }}</td>
                                            <td>{{ $ownerData->no_hp }}</td>
                                            <td>{{ $ownerData->alamat }}</td>
                                            <td data-toggle="tooltip" title="{{ $ownerData->catatan }}">
                                                {{ Str::limit($ownerData->catatan, 20) }}</td>
                                            <td>
                                                {{-- edit --}}
                                                <a href="{{ route('owner.edit', $ownerData->id) }}"
                                                    class="btn  btn-warning btn-md"><i class="fas fa-pencil-alt"></i></a>
                                                {{-- delete --}}
                                                <button class="btn btn-danger btn-md"
                                                    data-confirm="Hapus?|Apakah anda ingin menghapus data ini?"
                                                    data-confirm-yes="document.getElementById('delete-form-{{ $ownerData->id }}').submit();">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <form id="delete-form-{{ $ownerData->id }}"
                                                    action="{{ route('owner.destroy', $ownerData->id) }}" method="POST"
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
