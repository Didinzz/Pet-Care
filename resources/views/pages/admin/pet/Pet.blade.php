@extends('layout.admin')
@section('title', 'Hewan Peliharaan')
@section('customer', 'active')
@section('pet', 'active')

@section('content')
    <div class="section-header">
        <h1>Data Hewan Peliharaan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Hewan Peliharaan</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <x-alert />

                    <div class="card-header d-flex justify-content-between">
                        <h4>Data Hewan Peliharaan</h4>
                        <a href="{{ route('pet.create') }}"><button
                                class="btn btn-success btn-lg text-white">Tambah</button></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Pemilik</th>
                                        <th>Nama Hewan</th>
                                        <th>Jenis</th>
                                        <th>Ras</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Umur</th>
                                        <th>Status Vaksinasi</th>
                                        <th>Catatan Khusus</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pets as $index => $pet)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pet->owner->nama_lengkap ?? '-' }}</td>
                                            <td>{{ $pet->nama_hewan }}</td>
                                            <td>{{ ucfirst($pet->jenis_hewan) }}</td>
                                            <td>{{ $pet->ras_hewan ?? '-' }}</td>
                                            <td>{{ $pet->jenis_kelamin }}</td>
                                            <td>
                                                {{-- Umur dalam bulan, tampilkan dalam format Tahun Bulan --}}
                                                @php
                                                    $tahun = floor($pet->umur / 12);
                                                    $bulan = $pet->umur % 12;
                                                    $formatUmur =
                                                        ($tahun ? $tahun . ' tahun ' : '') .
                                                        ($bulan ? $bulan . ' bulan' : '');
                                                @endphp
                                                {{ $formatUmur ?: '-' }}
                                            </td>
                                            <td>{{ $pet->status_vaksinasi }}</td>
                                            <td data-toggle="tooltip" title="{{ $pet->catatan_khusus }}">
                                                {{ Str::limit($pet->catatan_khusus, 20) }}
                                            </td>
                                            <td>
                                                {{-- tombol edit --}}
                                                <a href="{{ route('pet.edit', $pet->id) }}" class="btn btn-warning btn-md">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                {{-- tombol delete --}}
                                                <button class="btn btn-danger btn-md"
                                                    data-confirm="Hapus?|Apakah anda ingin menghapus data ini?"
                                                    data-confirm-yes="document.getElementById('delete-form-{{ $pet->id }}').submit();">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <form id="delete-form-{{ $pet->id }}"
                                                    action="{{ route('pet.destroy', $pet->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">Data hewan tidak tersedia</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
