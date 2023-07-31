<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Permintaan;
use App\Models\Perancangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PermintaanController extends Controller
{
    public function index()
    {
        $permintaans = Permintaan::all();
        if (Auth::user()->role == 'user'){
            $permintaans = Permintaan::where('user_id', Auth::user()->id)->get();
        }

        return view('admin.permintaans.index', compact('permintaans'));
    }

    public function create()
    {
        $users = User::where('role', 'user')->get();

        return view('admin.permintaans.create', compact('users'));
    }

    public function store(Request $request)
    {
        $tanggalLembur = Carbon::createFromFormat('d-m-Y', $request->input('tanggal_lembur'))->format('Y-m-d');
        $request->merge(['tanggal_lembur' => $tanggalLembur]);
    
        $permintaan = Permintaan::create($request->all());
        if (Auth::user()->role == 'user') {
            $permintaan->user_id = Auth::user()->id;
            $permintaan->disetujui_karyawan = true;
            $permintaan->save();
        }
    
        return redirect()->route('dashboard.permintaans.index');
    }
    

    public function edit(Permintaan $permintaan)
    {
        $users = User::where('role', 'user')->get();

        $permintaan->load('user');

        return view('admin.permintaans.edit', compact('permintaan', 'users'));
    }

    // public function perancangan(Permintaan $permintaan)
    // {
    //     $count = 0;
    //     $perancangan = Perancangan::where('permintaan_id', $permintaan->id)->count();
    //     if ($perancangan > 0) {
    //         $count = $perancangan;
    //         $perancangan = Perancangan::where('permintaan_id', $permintaan->id)->first();
    //     }
    //     return view('admin.perancangans.index', compact('permintaan', 'count', 'perancangan'));
    // } 


    public function update(Request $request, Permintaan $permintaan)
    {
        $tanggalLembur = Carbon::createFromFormat('d-m-Y', $request->input('tanggal_lembur'))->format('Y-m-d');
        $request->merge(['tanggal_lembur' => $tanggalLembur]);
    
        $permintaan->update($request->all());
    
        return redirect()->route('dashboard.permintaans.index');
    }

    public function show(Permintaan $permintaan)
    {
        $permintaan->load('user');

        return view('admin.permintaans.show', compact('permintaan'));
    }

    public function destroy(Permintaan $permintaan)
    {
        $permintaan->delete();

        return redirect()->route('dashboard.permintaans.index');
    }

    // public function massDestroy(MassDestroyPermintaanRequest $request)
    // {
    //     $permintaans = Permintaan::find(request('ids'));

    //     foreach ($permintaans as $permintaan) {
    //         $permintaan->delete();
    //     }

    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}

