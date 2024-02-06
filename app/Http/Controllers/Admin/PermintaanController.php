<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
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
        $pelanggans = User::where('role', 'user')->get();
        return view('admin.permintaans.create', compact('pelanggans'));
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

        $pelanggans = User::where('role', 'user')->get();

        return view('admin.permintaans.edit', compact('permintaan', 'pelanggans'));
    }

    public function update(Request $request, Permintaan $permintaan)
    {
        if ($request->status != 'reservasi') {
            $request->merge([
                'tanggal_diproses' => Carbon::now()
            ]);
        }

        $permintaan->update($request->all());

        return redirect()->route('dashboard.permintaans.index');
    }

    // public function show(Permintaan $permintaan)
    // {
    //     $permintaan->load('user', 'barang');
    //     $pelamars = User::where('role', 'user')->get();
    //     return view('admin.permintaans.show', compact('permintaan', 'pelamars'));
    // }

    public function destroy(Permintaan $permintaan)
    {
        $permintaan->delete();

        return back();
    }
}
