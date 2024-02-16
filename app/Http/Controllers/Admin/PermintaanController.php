<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Interview;
use App\Models\Penerimaan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PermintaanController extends Controller
{
    public function index()
    {
        $penerimaans = Penerimaan::all();

        return view('admin.permintaans.index', compact('penerimaans'));
    }

    public function create()
    {
        // $desains = Interview::where('status', 'setuju')->get();
        $barangs = Permintaan::where('status', 'setuju')
            ->where('status_direktur', 'setuju')
            ->get();
        return view('admin.permintaans.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        // if (Auth::user()->role == 'user') {
        $user_id = Auth::user()->name;
        $request->merge([
            'nama_sectionhead' => $user_id
        ]);
        // }
        $permintaan = Penerimaan::create($request->all());

        return redirect()->route('dashboard.permintaans.index');
    }

    public function edit(Penerimaan $permintaan)
    {
        $barangs = Permintaan::where('status', 'setuju')
            ->where('status_direktur', 'setuju')
            ->get();

        return view('admin.permintaans.edit', compact('permintaan', 'barangs'));
    }

    public function update(Request $request, Penerimaan $permintaan)
    {
        // if ($request->status != 'reservasi') {
        //     $request->merge([
        //         'tanggal_diproses' => Carbon::now()
        //     ]);
        // }

        $permintaan->update($request->all());

        return redirect()->route('dashboard.permintaans.index');
    }

    // public function show(Permintaan $permintaan)
    // {
    //     $permintaan->load('user', 'barang');
    //     $pelamars = User::where('role', 'user')->get();
    //     return view('admin.permintaans.show', compact('permintaan', 'pelamars'));
    // }

    public function destroy(Penerimaan $permintaan)
    {
        $permintaan->delete();

        return back();
    }
}
