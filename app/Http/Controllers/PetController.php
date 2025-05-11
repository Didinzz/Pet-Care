<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::with('owner')->get();
        return view('pages.admin.pet.Pet', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $owners = Owner::all();

        return view('pages.admin.pet.Create', compact('owners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_hewan' => 'required|string|max:50',
            'owner_id' => 'required|exists:owners,id',
            'jenis_hewan' => 'required|string|max:50',
            'ras_hewan' => 'nullable|string|max:50',
            'jenis_kelamin' => 'required|in:Jantan,Betina',
            'status_vaksinasi' => 'required|in:Belum,Lengkap,Perlu Booster',
            'catatan_khusus' => 'nullable|string',
            'umur_tahun' => 'nullable|integer|min:0',
            'umur_bulan' => 'nullable|integer|min:0',
        ]);

        $totalUmur = ($request->umur_tahun * 12) + $request->umur_bulan;

        Pet::create([
            'nama_hewan' => $validated['nama_hewan'],
            'owner_id' => $validated['owner_id'],
            'jenis_hewan' => $validated['jenis_hewan'],
            'ras_hewan' => $validated['ras_hewan'] ?? null,
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'umur' => $totalUmur,
            'status_vaksinasi' => $validated['status_vaksinasi'],
            'catatan_khusus' => $validated['catatan_khusus'] ?? null,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('pet')->with('success', 'Data hewan peliharaan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $owners = Owner::all();
        $pet = Pet::with('owner')->find($id);
        return view('pages.admin.pet.Edit', compact('pet', 'owners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_hewan' => 'required|string|max:50',
            'owner_id' => 'required|exists:owners,id',
            'jenis_hewan' => 'required|string|max:50',
            'ras_hewan' => 'nullable|string|max:50',
            'jenis_kelamin' => 'required|in:Jantan,Betina',
            'status_vaksinasi' => 'required|in:Belum,Lengkap,Perlu Booster',
            'catatan_khusus' => 'nullable|string',
            'umur_tahun' => 'nullable|integer|min:0',
            'umur_bulan' => 'nullable|integer|min:0|max:11',
        ]);

        // Ambil data pet berdasarkan ID
        $pet = Pet::findOrFail($id);

        // Konversi umur ke dalam satuan bulan
        $umur_tahun = $validated['umur_tahun'] ?? 0;
        $umur_bulan = $validated['umur_bulan'] ?? 0;
        $umur_total = ($umur_tahun * 12) + $umur_bulan;

        // Update data pet
        $pet->update([
            'nama_hewan' => $validated['nama_hewan'],
            'owner_id' => $validated['owner_id'],
            'jenis_hewan' => $validated['jenis_hewan'],
            'ras_hewan' => $validated['ras_hewan'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'status_vaksinasi' => $validated['status_vaksinasi'],
            'catatan_khusus' => $validated['catatan_khusus'],
            'umur' => $umur_total,
        ]);

        // Redirect dengan flash message
        return redirect()->route('pet')->with('success', 'Data hewan berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pet::destroy($id);
        return redirect()->route('pet')->with('success', 'Data hewan peliharaan berhasil dihapus.');
    }
}
