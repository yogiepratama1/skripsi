<?php

namespace App\Http\Controllers\Admin;

use \PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Penilaian;
use App\Models\Permintaan;
use App\Models\Perancangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PerancanganController extends Controller
{
    public function create(Permintaan $permintaan)
    {
        return view('admin.perancangans.create', compact('permintaan'));
    }

    public function store(Request $request)
    {
        $tanggal_promo = Carbon::createFromFormat('d-m-Y', $request->input('tanggal_promo'))->format('Y-m-d');
        $perancangan = Perancangan::create([
            'permintaan_id' => $request->input('permintaan_id'),
            'promo' => $request->input('promo'),
            'tanggal_promo' => $tanggal_promo,
        ]);

        return redirect()->route('dashboard.permintaans.perancangan', $perancangan->permintaan_id);
    }

    public function edit(Perancangan $perancangan)
    {
        return view('admin.perancangans.edit',  compact('perancangan'));
    }

    public function mulai(Perancangan $perancangan)
    {
        $perancangan->mulai_konstruksi = 1;
        $perancangan->save();
        return redirect()->route('dashboard.permintaans.perancangan', $perancangan->permintaan_id);
    }

    public function setujui(Perancangan $perancangan)
    {
        $perancangan->setuju = 1;
        $perancangan->save();
        return redirect()->route('dashboard.permintaans.perancangan', $perancangan->permintaan_id);
    }

    public function tolak(Perancangan $perancangan)
    {
        $perancangan->setuju = 2;
        $perancangan->save();
        return redirect()->route('dashboard.permintaans.perancangan', $perancangan->permintaan_id);
    }
    
    public function update(Request $request, Perancangan $perancangan)
    {
        $tanggal_promo = Carbon::createFromFormat('d-m-Y', $request->input('tanggal_promo'))->format('Y-m-d');
        $perancangan->update([
            'promo' => $request->input('promo'),
            'tanggal_promo' => $tanggal_promo,
        ]);

        return redirect()->route('dashboard.permintaans.perancangan', $perancangan->permintaan_id);
    }

    public function destroy(Perancangan $perancangan)
    {
        $permintaanId = $perancangan->permintaan_id;
        $perancangan->delete();
        return redirect()->route('dashboard.permintaans.perancangan', $permintaanId);
    }

    // public function massDestroy(MassDestroyAssetRequest $request)
    // {
    //     $penilaians = Penilaian::find(request('ids'));

    //     foreach ($penilaians as $penilaian) {
    //         $penilaian->delete();
    //     }

    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}
