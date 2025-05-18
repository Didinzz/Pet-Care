@extends('layout.admin')
@section('title', 'Feedback')
@section('feedback', 'active')
@section('feedbackTable', 'active')

@section('content')
    <div class="section-header">
        <h1>Data Feedback</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Feedback</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <x-alert />

                    <div class="card-header d-flex justify-content-between">
                        <h4>Data Feedback</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Tanggal</th>
                                        <th>Layanan</th>
                                        <th>Fasilitas</th>
                                        <th>Pengalaman</th>
                                        <th>Komentar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($feedback as $index => $feedbackData)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $feedbackData->name }}</td>
                                            <td>{{ $feedbackData->kontak }}</td>
                                            <td>{{ $feedbackData->tanggal_berkunjung }}</td>
                                            <td>{{ $feedbackData->layanan }}</td>
                                            <td>{{ $feedbackData->fasilitas }}</td>
                                            <td>{{ $feedbackData->pengalaman }}</td>
                                            <td data-toggle="tooltip" title="{{ $feedbackData->komentar }}">
                                                {{ Str::limit($feedbackData->komentar, 20) }}</td>
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

