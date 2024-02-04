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
use App\Http\Requests\StorePermintaanRequest;
use App\Http\Requests\UpdatePermintaanRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MassDestroyPermintaanRequest;
use Illuminate\Support\Facades\Auth;

class PermintaanController extends Controller
{
    public function index()
    {
        $permintaans = Permintaan::all();
        if (Auth::user()->role == 'user') {
            $permintaans = Permintaan::where('user_id', Auth::user()->id)->get();
        }

        return view('admin.permintaans.index', compact('permintaans'));
    }

    public function create()
    {
        $pelamars = User::where('role', 'user')->get();
        return view('admin.permintaans.create', compact('pelamars'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->role == 'user') {
            $user_id = Auth::user()->id;
            $request->merge([
                'user_id' => $user_id
            ]);
        }
        $permintaan = Permintaan::create($request->all());

        return redirect()->route('dashboard.permintaans.index');
    }

    public function edit(Permintaan $permintaan)
    {
        // $users = User::where('role', 'sales')->pluck('name', 'id')->prepend('Please Select', '');

        // $barangs = Asset::pluck('name', 'id')->prepend('Please Select', '');
        // $aksesoris = AssetCategory::pluck('name', 'id')->prepend('Please Select', '');

        $permintaan;
        $pelamars = User::where('role', 'user')->get();

        return view('admin.permintaans.edit', compact('permintaan', 'pelamars'));
    }

    public function update(Request $request, Permintaan $permintaan)
    {

        $permintaan->update($request->all());

        return redirect()->route('dashboard.permintaans.index');
    }

    public function show(Permintaan $permintaan)
    {
        $permintaan->load('user', 'barang');
        $pelamars = User::where('role', 'user')->get();
        return view('admin.permintaans.show', compact('permintaan', 'pelamars'));
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

