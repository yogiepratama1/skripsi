<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLaporanRequest;
use App\Http\Requests\StoreLaporanRequest;
use App\Http\Requests\UpdateLaporanRequest;
use App\Models\Laporan;
use App\Models\NilaiVariable;
use App\Models\Permintaan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use \PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = NilaiVariable::orderBy('hasil', 'desc')->get();

        return view('admin.laporans.index', compact('laporans'));
    }


    public function create(Request $request)
    {
        $start = $request->input('start');
        $end = $request->input('end');
        $laporans = NilaiVariable::whereBetween('created_at', [$start, $end])
            ->orderBy('hasil', 'desc')
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

    public function edit(Laporan $laporan)
    {
        $permintaans = Permintaan::pluck('nama_pelanggan', 'id')->prepend(trans('global.pleaseSelect'), '');

        $laporan->load('permintaan');

        return view('admin.laporans.edit', compact('laporan', 'permintaans'));
    }

    public function update(UpdateLaporanRequest $request, Laporan $laporan)
    {
        $laporan->update($request->all());

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
