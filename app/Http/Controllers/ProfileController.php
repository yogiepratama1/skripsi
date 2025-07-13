<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Menampilkan halaman profil (Read)
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    // Menampilkan form edit profil (Update)
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // Memperbarui data profil (Update)
    public function update(Request $request)
    {
        $user = Auth::user();
        $profileData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'nomor_telepon' => 'nullable|string|max:15',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // validasi gambar
        ]);

        // Logika untuk upload foto
        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('profile_pictures', 'public');
            $profileData['foto_profil'] = $path;
        }

        // Gunakan updateOrCreate untuk membuat profil jika belum ada, atau update jika sudah ada
        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            $profileData
        );

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui!');
    }
}
