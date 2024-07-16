<?php

namespace App\Http\Controllers\Admin;

use Gate;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Asset;
use App\Models\Laporan;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use App\Models\AssetCategory;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MassDestroyPermintaanRequest;

class PermintaanController extends Controller
{
    public function index()
    {
        $permintaans = Permintaan::all();

        return view('admin.permintaans.index', compact('permintaans'));
    }

    public function create()
    {
        return view('admin.permintaans.create');
    }

    public function store(Request $request)
    {
        $permintaan = Permintaan::create($request->all());

        return redirect()->route('dashboard.permintaans.index');
    }

    public function edit(Permintaan $permintaan)
    {
        return view('admin.permintaans.edit', compact('permintaan'));
    }

    public function update(Request $request, Permintaan $permintaan)
    {
        if($request->input('tanggal_dipasang')){
            $tanggalLembur = Carbon::createFromFormat('d-m-Y', $request->input('tanggal_dipasang'))->format('Y-m-d');
            $request->merge(['tanggal_dipasang' => $tanggalLembur]);
        }
        $permintaan->update($request->all());

        return redirect()->route('dashboard.permintaans.index');
    }

    public function show(Permintaan $permintaan)
    {
        return view('admin.permintaans.show', compact('permintaan'));
    }

    public function destroy(Permintaan $permintaan)
    {
        $permintaan->delete();

        return back();
    }

    public function massDestroy(MassDestroyPermintaanRequest $request)
    {
        $permintaans = Permintaan::find(request('ids'));

        foreach ($permintaans as $permintaan) {
            $permintaan->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

