<?php

use App\Http\Controllers\API\WhatssAppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\JenisLayananChartController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\RiwayatKunjunganChartController;
use App\Http\Controllers\RiwayatKunjunganController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'show'])->name('dashboard');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        // owner
        Route::get('/owner', [OwnerController::class, 'index'])->name('owner');
        Route::get('/owner/create', [OwnerController::class, 'create'])->name('owner.create');
        Route::post('/owner/post', [OwnerController::class, 'store'])->name('owner.store');
        Route::get('/owner/edit/{id}', [OwnerController::class, 'edit'])->name('owner.edit');
        Route::put('/owner/update/{id}', [OwnerController::class, 'update'])->name('owner.update');
        Route::delete('/owner/delete/{id}', [OwnerController::class, 'destroy'])->name('owner.destroy');

        // pet
        Route::get('/pet', [PetController::class, 'index'])->name('pet');
        Route::get('/pet/create', [PetController::class, 'create'])->name('pet.create');
        Route::post('/pet/post', [PetController::class, 'store'])->name('pet.store');
        Route::get('/pet/edit/{id}', [PetController::class, 'edit'])->name('pet.edit');
        Route::put('/pet/update/{id}', [PetController::class, 'update'])->name('pet.update');
        Route::delete('/pet/delete/{id}', [PetController::class, 'destroy'])->name('pet.destroy');

        // dokter
        Route::get('/dokter', [DokterController::class, 'index'])->name('dokter');
        Route::get('/dokter/create', [DokterController::class, 'create'])->name('dokter.create');
        Route::post('/dokter/post', [DokterController::class, 'store'])->name('dokter.store');
        Route::get('/dokter/edit/{id}', [DokterController::class, 'edit'])->name('dokter.edit');
        Route::put('/dokter/update/{id}', [DokterController::class, 'update'])->name('dokter.update');
        Route::delete('/dokter/delete/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');

        //Riwayat
        Route::get('/riwayat', [RiwayatKunjunganController::class, 'index'])->name('riwayat');
        Route::get('/riwayat/create', [RiwayatKunjunganController::class, 'create'])->name('riwayat.create');
        Route::post('/riwayat/post', [RiwayatKunjunganController::class, 'store'])->name('riwayat.store');
        Route::get('/riwayat/edit/{id}', [RiwayatKunjunganController::class, 'edit'])->name('riwayat.edit');
        Route::put('/riwayat/update/{id}', [RiwayatKunjunganController::class, 'update'])->name('riwayat.update');
        Route::delete('/riwayat/delete/{id}', [RiwayatKunjunganController::class, 'destroy'])->name('riwayat.destroy');


        // chart
        Route::get('/riwayat-kunjungan-chart', [RiwayatKunjunganChartController::class, 'getChartData'])->name('riwayat.chart.data');
        Route::get('/jenis-layanan-chart', [JenisLayananChartController::class, 'getJenisLayananChart'])->name('jenis.chart.data');

        // feedback
        Route::get('/feedback', [FeedbackController::class, 'dashboard'])->name('feedback.dashboard');
        Route::get('/feedback/table', [FeedbackController::class, 'feedbackTable'])->name('feedback.table');
        Route::get('/spiderChart-feedback', [FeedbackController::class, 'spiderChartFeedback'])->name('spiderChart.feedback');


    });
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'show'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::get('/', [LandingController::class, 'index'])->name('landing');


