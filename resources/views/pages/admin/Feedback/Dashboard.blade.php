@extends('layout.admin')
@section('title', 'Dashboard-Feedback')
@section('feedback', 'active')
@section('feedbackDashboard', 'active')
@section('content')
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary d-flex align-items-center justify-content-center">
                    <i class="fas fa-comment"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Feedback</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalFeedback ?? 0 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger d-flex align-items-center justify-content-center">
                    <i class="fas fa-star"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Rata-Rata Rating</h4>
                    </div>
                    <div class="card-body">
                        {{ $avgRating ?? 0 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning d-flex align-items-center justify-content-center">
                    <i class="fas fa-calendar"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Feedback Hari Ini</h4>
                    </div>
                    <div class="card-body">
                        {{ $feedbackToday ?? 0 }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('pages.admin.Feedback.FeedbackSpiderChart')
    </div>


@endsection
