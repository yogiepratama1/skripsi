<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLaporanRequest;
use App\Http\Requests\StoreLaporanRequest;
use App\Http\Requests\UpdateLaporanRequest;
use App\Models\Laporan;
use App\Models\Pengembalian;
use App\Models\Permintaan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use \PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Pengembalian::with('laporan')->get();

        return view('admin.laporans.index', compact('laporans'));
    }


    public function create(Request $request)
    {
        $start = $request->input('start');
        $end = $request->input('end');
        $laporans = Pengembalian::with('laporan')
            ->whereBetween('created_at', [$start, $end])
            ->orderBy('status')
            ->get();

        $pdf = PDF::loadView('admin.laporans.pdf', compact('laporans', 'start', 'end'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('laporan-list.pdf');
    }

    public function createAverageAksesoris()
    {
        $laporans = Permintaan::with('aksesoris')->get();

        $averageHargaByAssetCategory = $laporans->groupBy(function ($laporan) {
            return $laporan->aksesoris->name;
        })->map(function ($groupedLaporans) {
            $totalHarga = $groupedLaporans->sum(function ($laporan) {
                return $laporan->aksesoris->harga ?? 0;
            });

            $totalCount = $groupedLaporans->count();

            return $totalCount > 0 ? $totalHarga / $totalCount : 0;
        });

        $pdf = PDF::loadView('admin.laporans.pdf-harga', compact('averageHargaByAssetCategory'));
        return $pdf->download('laporan-list.pdf');
    }


    public function store(StoreLaporanRequest $request)
    {
        $laporan = Laporan::create($request->all());

        return redirect()->route('dashboard.laporans.index');
    }

    public function edit(Pengembalian $laporan)
    {
        return view('admin.laporans.edit', compact('laporan'));
    }

    public function update(Pengembalian $laporan, Request $request)
    {
        $pengembalian = Pengembalian::find($laporan->id);
        $laporan = Laporan::create([
            'pengembalian_id' => $pengembalian->id,
            'hasillaporan' => $request->hasillaporan
        ]);

        return redirect()->route('dashboard.laporans.index');
    }

    public function show(Laporan $laporan)
    {
        $laporan->load('permintaan');

        return view('admin.laporans.show', compact('laporan'));
    }

    public function destroy(Laporan $laporan)
    {
        $laporan->delete();

        return back();
    }

    public function massDestroy(MassDestroyLaporanRequest $request)
    {
        $laporans = Laporan::find(request('ids'));

        foreach ($laporans as $laporan) {
            $laporan->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
