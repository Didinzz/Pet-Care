<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Pet;
use App\Models\RiwayatKunjungan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(){
        $totalDokter = User::where('role', 'dokter')->count();
        $totalPelanggan = Owner::count();
        $totalHewan = Pet::count();
        $totalKunjungan = RiwayatKunjungan::count();
        return view('pages.admin.Dashboard.dashboard', compact('totalDokter', 'totalPelanggan', 'totalHewan', 'totalKunjungan'));
    }
}
