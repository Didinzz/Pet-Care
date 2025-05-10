@extends('pages.admin.index')
@section('title', 'Dashboard')
@section('dashboard', 'active')

@section('content')
    <!-- Dashboard Page -->
    <div class="page active" id="dashboard">
        <h2 class="page-title">Dashboard Overview</h2>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value">24</div>
                    <div class="stat-label">Appointments Today</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green">
                    <i class="fas fa-syringe"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value">18</div>
                    <div class="stat-label">Upcoming Vaccinations</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon teal">
                    <i class="fas fa-user-md"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value">8</div>
                    <div class="stat-label">Active Doctors</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="fas fa-paw"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value">156</div>
                    <div class="stat-label">Registered Pets</div>
                </div>
            </div>
        </div>

        <!-- Dashboard Grid -->
        {{-- nanti akan dibuat chart pakai class dasboard-grid --}}
        <div class="">
            <!-- Today's Appointments -->
            <div class="dashboard-card ">
                <div class="dashboard-card-header">
                    <h3 class="dashboard-card-title">Today's Appointments</h3>
                    <a href="#" class="dashboard-card-action" data-page="appointments">View All</a>
                </div>
                <div class="dashboard-card-body">
                    <div class="appointment-list">
                        <div class="appointment-item">
                            <div class="appointment-avatar">M</div>
                            <div class="appointment-info">
                                <div class="appointment-name">Max (Golden Retriever)</div>
                                <div class="appointment-details">Vaccination • Dr. Sarah Johnson</div>
                            </div>
                            <div class="appointment-time">9:00 AM</div>
                        </div>
                        <div class="appointment-item">
                            <div class="appointment-avatar">B</div>
                            <div class="appointment-info">
                                <div class="appointment-name">Bella (Siamese Cat)</div>
                                <div class="appointment-details">Checkup • Dr. Emily Rodriguez</div>
                            </div>
                            <div class="appointment-time">10:30 AM</div>
                        </div>
                        <div class="appointment-item">
                            <div class="appointment-avatar">C</div>
                            <div class="appointment-info">
                                <div class="appointment-name">Charlie (Labrador)</div>
                                <div class="appointment-details">Surgery • Dr. Michael Chen</div>
                            </div>
                            <div class="appointment-time">11:45 AM</div>
                        </div>
                        <div class="appointment-item">
                            <div class="appointment-avatar">L</div>
                            <div class="appointment-info">
                                <div class="appointment-name">Luna (Maine Coon)</div>
                                <div class="appointment-details">Dental Care • Dr. Sarah Johnson</div>
                            </div>
                            <div class="appointment-time">1:15 PM</div>
                        </div>
                        <div class="appointment-item">
                            <div class="appointment-avatar">O</div>
                            <div class="appointment-info">
                                <div class="appointment-name">Oliver (Beagle)</div>
                                <div class="appointment-details">Checkup • Dr. Robert Taylor</div>
                            </div>
                            <div class="appointment-time">3:00 PM</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.admin.components.modal.logout')
@endsection
