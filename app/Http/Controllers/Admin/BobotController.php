<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bobot;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BobotController extends Controller
{
    public function index()
    {
        $bobots = Bobot::all();

        return view('admin.permintaans.index', compact('bobots'));
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

    public function edit(Bobot $bobot)
    {
        // $users = User::where('role', 'sales')->pluck('name', 'id')->prepend('Please Select', '');

        // $barangs = Asset::pluck('name', 'id')->prepend('Please Select', '');
        // $aksesoris = AssetCategory::pluck('name', 'id')->prepend('Please Select', '');

        $pelanggans = User::where('role', 'user')->get();

        return view('admin.permintaans.edit', compact('bobot'));
    }

    public function update(Request $request, Bobot $bobot)
    {
        // if ($request->status != 'reservasi') {
        //     $request->merge([
        //         'tanggal_diproses' => Carbon::now()
        //     ]);
        // }

        $bobot->update($request->all());

        return redirect()->route('dashboard.bobots.index');
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
