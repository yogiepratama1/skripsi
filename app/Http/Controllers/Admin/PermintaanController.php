<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perancangan;
use App\Models\Permintaan;
use App\Models\User;
use Illuminate\Http\Request;
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

    public function kepuasan(Permintaan $permintaan)
    {
        return view('admin.permintaans.kepuasan', compact('permintaan'));
    }

    public function storeKepuasan(Request $request, Permintaan $permintaan)
    {
        $permintaan->update($request->all());

        return redirect()->route('dashboard.permintaans.index');
    }

    public function store(Request $request)
    {
        $permintaan = Permintaan::create($request->all());
        if (Auth::user()->role == 'user') {
            $permintaan->user_id = Auth::user()->id;
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

    public function perancangan(Permintaan $permintaan)
    {
        $count = 0;
        $perancangan = Perancangan::where('permintaan_id', $permintaan->id)->count();
        if ($perancangan > 0) {
            $count = $perancangan;
            $perancangan = Perancangan::where('permintaan_id', $permintaan->id)->first();
        }
        return view('admin.perancangans.index', compact('permintaan', 'count', 'perancangan'));
    } 


    public function update(Request $request, Permintaan $permintaan)
    {
        $permintaan->update($request->all());

        return redirect()->route('dashboard.permintaans.index');
    }

    // public function show(Permintaan $permintaan)
    // {
    //     $permintaan->load('user');

    //     return view('admin.permintaans.show', compact('permintaan'));
    // }

    public function destroy(Permintaan $permintaan)
    {
        $permintaan->delete();

        return back();
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

