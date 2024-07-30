<?php

namespace App\Http\Controllers\Admin;

use App\Models\Asset;
use App\Models\Absensi;
use App\Models\Permintaan;
use App\Models\AbsensiSiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = Absensi::with('asset', 'absenSiswa')->get();
        if (auth()->user()->role == 'user') {
            $permintaans = Permintaan::where('user_id', auth()->id())->where('disetujui', true)->get();

            // Extract eskul values and split by comma if necessary
            $eskulArray = $permintaans->flatMap(function ($permintaan) {
                return explode(',', $permintaan->eskul);
            })->toArray();

            // Filter absensis where asset->name is in the eskulArray
            $absensis = Absensi::with('asset', 'absenSiswa')
                ->whereHas('asset', function ($query) use ($eskulArray) {
                    $query->whereIn('name', $eskulArray);
                })
                ->get();
        }
        return view('admin.absensis.index', compact('absensis'));
    }

    public function create()
    {
        $assets = Asset::all();
        return view('admin.absensis.create', compact('assets'));
    }

    public function store(Request $request)
    {    
        $absensi = Absensi::create($request->all());
        // Tambahkan logika untuk menyimpan absensi siswa jika diperlukan
    
        return redirect()->route('dashboard.absensis.index')->with('success', 'Absensi created successfully.');
    }    

    public function show(Absensi $absensi)
    {
        return view('admin.absensis.show', compact('absensi'));
    }

    public function edit(Absensi $absensi)
    {
        $assets = Asset::all();
        return view('admin.absensis.edit', compact('absensi', 'assets'));
    }
    
    public function absen(Absensi $absensi)
    {
        $assets = Asset::all();
        return view('admin.absensis.absen', compact('absensi', 'assets'));
    }

    public function update(Request $request, Absensi $absensi)
    {    
        $absensi->update($request->all());
    
        return redirect()->route('dashboard.absensis.index')->with('success', 'Absensi updated successfully.');
    }

    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect()->route('dashboard.absensis.index')->with('success', 'Absensi deleted successfully.');
    }

    public function updateAbsen(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:H,A,I,S',
        ]);
        $permintaans = Permintaan::where('user_id', auth()->id())->get();

        // Extract eskul values and split by comma if necessary
        $eskulArray = $permintaans->flatMap(function ($permintaan) {
            return explode(',', $permintaan->eskul);
        })->toArray();
        
        // Find the matching kelas
        $matchingKelas = null;
        foreach ($permintaans as $permintaan) {
            $eskuls = explode(',', $permintaan->eskul);
            if (array_intersect($eskuls, $eskulArray)) {
                $matchingKelas = $permintaan->kelas;
                break;
            }
        }

        // dd($matchingKelas);
        
        $absensiSiswa = AbsensiSiswa::updateOrCreate(
            [
                'absensi_id' => $id,
                'user_id' => Auth::user()->id
            ],
            [
                'status' => $request->status,
                'kelas' => $matchingKelas
            ]
        );

        return redirect()->route('dashboard.absensis.index', $id)->with('success', 'Status kehadiran diperbarui.');
    }
}
