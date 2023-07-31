<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use App\Models\Perancangan;
use App\Models\Permintaan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use \PDF;

class PerancanganController extends Controller
{
    public function create(Permintaan $permintaan)
    {
        return view('admin.perancangans.create', compact('permintaan'));
    }

    public function store(Request $request)
    {
        $perancangan = Perancangan::create($request->all());
        if ($request->hasFile('gambar_bangunan')) {
            $request->file('gambar_bangunan')->move('gambar_bangunan/', $request->file('gambar_bangunan')->getClientOriginalName());
            $perancangan->gambar_bangunan = $request->file('gambar_bangunan')->getClientOriginalName();
            $perancangan->save();
        }
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
        $perancangan->update($request->all());
        if ($request->hasFile('gambar_bangunan')) {
            $request->file('gambar_bangunan')->move('gambar_bangunan/', $request->file('gambar_bangunan')->getClientOriginalName());
            $perancangan->gambar_bangunan = $request->file('gambar_bangunan')->getClientOriginalName();
            $perancangan->save();
        }
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
