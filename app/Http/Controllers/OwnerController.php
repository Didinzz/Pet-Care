<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owner = Owner::all();
        return view('pages.admin.Owner.Owner', compact('owner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.Owner.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'no_hp' => 'required|min:10',
            'address' => 'required',
            'note' => 'required',
        ], [
            'name.required' => 'Nama pelanggan harus diisi',
            'no_hp.required' => 'Nomor HP harus diisi',
            'no_hp.min' => 'Nomor HP minimal 10 digit',
            'address.required' => 'Alamat harus diisi',
            'note.required' => 'Catatan harus diisi',
        ]);


        Owner::create([
            'nama_lengkap' => $request['name'],
            'no_hp' => $request['no_hp'],
            'alamat' => $request['address'],
            'catatan' => $request['note']
        ]);

        return redirect()->route('owner')->with('success', 'Pelanggan baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $owner = Owner::findOrFail($id);
        return view('pages.admin.Owner.Edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'no_hp' => 'required|min:10',
            'address' => 'required',
            'note' => 'required',
        ], [
            'name.required' => 'Nama pelanggan harus diisi',
            'no_hp.required' => 'Nomor HP harus diisi',
            'no_hp.min' => 'Nomor HP minimal 10 digit',
            'address.required' => 'Alamat harus diisi',
            'note.required' => 'Catatan harus diisi',
        ]);

        $owner = Owner::findOrFail($id);
        $owner->update([
            'nama_lengkap' => $request['name'],
            'no_hp' => $request['no_hp'],
            'alamat' => $request['address'],
            'catatan' => $request['note']
        ]);

        return redirect()->route('owner')->with('success', 'Pelanggan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Owner::destroy($id);
        return redirect()->route('owner')->with('success', 'Pelanggan berhasil dihapus');
    }
}
