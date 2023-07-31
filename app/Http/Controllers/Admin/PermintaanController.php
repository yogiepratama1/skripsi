<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermintaanRequest;
use App\Http\Requests\StorePermintaanRequest;
use App\Http\Requests\UpdatePermintaanRequest;
use App\Models\Asset;
use App\Models\Laporan;
use App\Models\Permintaan;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermintaanController extends Controller
{
    public function index()
    {
        $permintaans = Permintaan::with(['barang'])->get();

        return view('admin.permintaans.index', compact('permintaans'));
    }

    public function create()
    {
        $users = User::where('role', 'sales')->pluck('name', 'id')->prepend('Please Select', '');

        $barangs = Asset::pluck('name', 'id')->prepend('Please Select', '');

        return view('admin.permintaans.create', compact('barangs', 'users'));
    }

    public function store(StorePermintaanRequest $request)
    {
        $permintaan = Permintaan::create($request->all());
        $laporan = Laporan::create([
            'permintaan_id' => $permintaan->id,
        ]);

        return redirect()->route('dashboard.permintaans.index');
    }

    public function edit(Permintaan $permintaan)
    {
        $users = User::where('role', 'sales')->pluck('name', 'id')->prepend('Please Select', '');

        $barangs = Asset::pluck('name', 'id')->prepend('Please Select', '');

        $permintaan->load('user', 'barang');

        return view('admin.permintaans.edit', compact('barangs', 'permintaan', 'users'));
    }

    public function update(UpdatePermintaanRequest $request, Permintaan $permintaan)
    {
        $permintaan->update($request->all());

        return redirect()->route('dashboard.permintaans.index');
    }

    public function show(Permintaan $permintaan)
    {
        $permintaan->load('user', 'barang');

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

