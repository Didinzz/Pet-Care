<?php

namespace App\Http\Controllers;

use App\Models\JadwalPraktik;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokters = User::where('role', 'dokter')
            ->with('jadwalPraktik')
            ->get();
        return view('pages.admin.Dokter.Dokter', compact('dokters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.Dokter.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'kontak' => 'required|string|max:20',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'alamat' => 'required|string',
            'jadwal_praktik' => 'required|array', // Pastikan ini array
            'jam_mulai' => 'required|string',    // Tambahkan validasi jam
            'jam_selesai' => 'required|string',  // Tambahkan validasi jam
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'nama_lengkap.string' => 'Nama lengkap harus berupa string.',
            'nama_lengkap.max' => 'Nama lengkap maksimal 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'kontak.required' => 'Kontak wajib diisi.',
            'kontak.string' => 'Kontak harus berupa string.',
            'kontak.max' => 'Kontak maksimal 20 karakter.',
            'foto.required' => 'Foto wajib diunggah.',
            'foto.image' => 'Foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat jpg, jpeg, atau png.',
            'foto.max' => 'Foto maksimal berukuran 2MB.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa string.',
            'jadwal_praktik.required' => 'Jadwal praktik wajib dipilih.',
            'jadwal_praktik.array' => 'Format jadwal praktik tidak valid.',
            'jam_mulai.required' => 'Jam mulai praktik wajib diisi.',
            'jam_selesai.required' => 'Jam selesai praktik wajib diisi.',
        ]);

        // Simpan foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('foto-dokter', 'public');
        }

        // Buat user baru
        DB::beginTransaction();

        try {
            // Cek struktur tabel user - pastikan field alamat sesuai dengan nama kolom di database
            // (alamat atau address)
            $userFields = [
                'name' => $request->nama_lengkap,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'kontak' => $request->kontak,
                'alamat' => $request->alamat, // Pastikan nama field ini sesuai dengan kolom di database
                'foto' => $foto ?? null,
                'role' => 'dokter',
            ];

            // Jika kolom di database adalah 'address', ganti dengan ini:
            // 'address' => $request->alamat,

            // Simpan data user (dokter)
            $user = User::create($userFields);

            // Simpan jadwal praktik - pastikan nama field sama dengan di form
            JadwalPraktik::create([
                'user_id' => $user->id,
                'jadwal' => json_encode($request->jadwal_praktik), // Sesuaikan dengan nama di form
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
            ]);

            DB::commit();

            return redirect()->route('dokter')->with('success', 'Dokter dan jadwal praktik berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // Log error untuk debugging
            return redirect()->route('dokter')->with('danger', 'Terjadi kesalahan saat menyimpan data: ' . $th->getMessage());
        }
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
        $dokter = User::findOrFail($id);

        return view('pages.admin.Dokter.Edit', compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'kontak' => 'required|string|max:20',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|min:6',
            'jadwal_praktik' => 'required|array',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'nama_lengkap.max' => 'Nama lengkap maksimal 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'kontak.required' => 'Kontak wajib diisi.',
            'kontak.max' => 'Kontak maksimal 20 karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'foto.image' => 'Foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat jpg, jpeg, atau png.',
            'foto.max' => 'Foto maksimal berukuran 2MB.',
            'password.min' => 'Password minimal 6 karakter.',
            'jadwal_praktik.required' => 'Jadwal praktik wajib dipilih.',
            'jadwal_praktik.array' => 'Format jadwal praktik tidak valid.',
            'jam_mulai.required' => 'Jam mulai praktik wajib diisi.',
            'jam_selesai.required' => 'Jam selesai praktik wajib diisi.',
        ]);

        // Mulai transaksi
        DB::beginTransaction();
        try {
            // Temukan dokter
            $dokter = User::where('id', $id)->where('role', 'dokter')->firstOrFail();

            // Update data user/dokter
            $updateData = [
                'name' => $request->nama_lengkap,
                'email' => $request->email,
                'kontak' => $request->kontak,
                'alamat' => $request->alamat,
            ];

            // Jika password diisi, update password
            if ($request->filled('password')) {
                $updateData['password'] = Hash::make($request->password);
            }

            // Jika foto diupload, simpan foto baru
            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($dokter->foto && Storage::disk('public')->exists($dokter->foto)) {
                    Storage::disk('public')->delete($dokter->foto);
                }

                // Upload foto baru
                $updateData['foto'] = $request->file('foto')->store('foto-dokter', 'public');
            }

            // Update data dokter
            $dokter->update($updateData);

            // Update atau buat jadwal praktik
            $jadwalPraktik = JadwalPraktik::updateOrCreate(
                ['user_id' => $dokter->id],
                [
                    'jadwal' => json_encode($request->jadwal_praktik),
                    'jam_mulai' => $request->jam_mulai,
                    'jam_selesai' => $request->jam_selesai,
                ]
            );

            DB::commit();

            return redirect()->route('dokter')->with('success', 'Data dokter berhasil diperbarui.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('danger', 'Terjadi kesalahan saat memperbarui data: ' . $th->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Hapus foto lama jika ada
        if ($user->foto && Storage::disk('public')->exists($user->foto)) {
            Storage::disk('public')->delete($user->foto);
        }

        // Hapus jadwal praktik
        if ($user->jadwalPraktik) {
            $user->jadwalPraktik->delete();
        }

        $user->delete();

        return redirect()->route('dokter')->with('success', 'Data dokter berhasil dihapus.');
    }
}
