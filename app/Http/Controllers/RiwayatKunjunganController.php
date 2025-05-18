<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\WhatssAppController;
use App\Models\Pet;
use App\Models\RiwayatKunjungan;
use App\Models\User;
use Illuminate\Http\Request;

class RiwayatKunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riwayats = RiwayatKunjungan::all();
        return view('pages.admin.Riwayat.RiwayatKunjungan', compact('riwayats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dokters = User::where('role', 'dokter')->get();
        $pets = Pet::with('owner')->get();
        $jenisLayanan = ['Grooming', 'Vaksinasi', 'Konsultasi', 'Perawatan', 'Operasi', 'Penyakit', 'Kontrol'];

        return view('pages.admin.Riwayat.Create', compact('dokters', 'pets', 'jenisLayanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required',
            'dokter_id' => 'required',
            'jenis_layanan' => 'required|in:Grooming,Vaksinasi,Konsultasi,Perawatan,Operasi,Penyakit,Kontrol',
            'tanggal_kunjungan' => 'required|date',
            'keterangan' => 'nullable|string',
            'tanggal_kunjungan_ulang' => 'nullable',
        ], [
            'pet_id.required' => 'Pet harus dipilih',
            'dokter_id.required' => 'Dokter harus dipilih',
            'pet_id.exists' => 'Pet tidak ditemukan',
            'user_id.exists' => 'Dokter tidak ditemukan',
            'jenis_layanan.required' => 'Jenis layanan harus dipilih',
            'jenis_layanan.in' => 'Jenis layanan tidak valid',
            'keterangan.string' => 'Keterangan harus berupa teks',
        ]);

        $nilaiKunjunganUlang = $request->kunjungan_ulang === 'on' ? true : false;
        $tanggalKunjunganUlang = $nilaiKunjunganUlang ? $request->tanggal_kunjungan_ulang : null;

        // Ambil data owner dari relasi pet -> owner
        $riwayatKunjungan = RiwayatKunjungan::create([
            'pet_id' => $request->pet_id,
            'user_id' => $request->dokter_id,
            'jenis_layanan' => $request->jenis_layanan,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'keterangan' => $request->keterangan,
            'kunjungan_ulang' => $nilaiKunjunganUlang,
            'tanggal_kunjungan_ulang' => $tanggalKunjunganUlang
        ]);


        $pet = $riwayatKunjungan->pet; // relasi pet() harus ada di model RiwayatKunjungan
        $owner = $pet->owner; // relasi owner() harus ada di model Pets


        if ($owner && $owner->nama_lengkap && $owner->no_hp) {
            WhatssAppController::sendMessage($owner->nama_lengkap, $owner->no_hp, $riwayatKunjungan->tanggal_kunjungan, $riwayatKunjungan->jenis_layanan, $riwayatKunjungan->tanggal_kunjungan_ulang);
        }

        $riwayatKunjungan->save();
        return redirect()->route('riwayat')->with('success', 'Riwayat kunjungan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(RiwayatKunjungan $riwayatKunjungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $riwayat = RiwayatKunjungan::findOrFail($id);
        $dokters = User::where('role', 'dokter')->get();
        $pets = Pet::with('owner')->get();
        $jenisLayanan = ['Grooming', 'Vaksinasi', 'Konsultasi', 'Perawatan', 'Operasi', 'Penyakit', 'Kontrol'];

        return view('pages.admin.Riwayat.Edit', compact('riwayat', 'dokters', 'pets', 'jenisLayanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pet_id' => 'required',
            'dokter_id' => 'required',
            'jenis_layanan' => 'required|in:Grooming,Vaksinasi,Konsultasi,Perawatan,Operasi,Penyakit,Kontrol',
            'tanggal_kunjungan' => 'required',
            'keterangan' => 'nullable|string',
            'tanggal_kunjungan_ulang' => 'nullable',
        ], [
            'pet_id.required' => 'Pet harus dipilih',
            'dokter_id.required' => 'Dokter harus dipilih',
            'jenis_layanan.required' => 'Jenis layanan harus dipilih',
            'jenis_layanan.in' => 'Jenis layanan tidak valid',
            'keterangan.string' => 'Keterangan harus berupa teks',
        ]);

        // dd($request->all());

        $nilaiKunjunganUlang = $request->kunjungan_ulang === 'on' ? true : false;
        $tanggalKunjunganUlang = $nilaiKunjunganUlang ? $request->tanggal_kunjungan_ulang : null;

        $riwayatKunjungan = RiwayatKunjungan::findOrFail($id);

        $riwayatKunjungan->update([
            'pet_id' => $request->pet_id,
            'user_id' => $request->dokter_id,
            'jenis_layanan' => $request->jenis_layanan,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'keterangan' => $request->keterangan,
            'kunjungan_ulang' => $nilaiKunjunganUlang,
            'tanggal_kunjungan_ulang' =>  $tanggalKunjunganUlang
        ]);

        $riwayatKunjungan->save();

        return redirect()->route('riwayat')->with('success', 'Riwayat kunjungan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $riwayatKunjungan = RiwayatKunjungan::findOrFail($id);

        $riwayatKunjungan->delete();

        return redirect()->route('riwayat')->with('success', 'Riwayat kunjungan berhasil dihapus');
    }
}
