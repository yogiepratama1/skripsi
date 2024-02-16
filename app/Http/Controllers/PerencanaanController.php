<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Interview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permintaan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PerencanaanController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'user') {
            $permintaans = Permintaan::where('user_id', Auth::user()->id)->get();
        } else {
            $permintaans = Permintaan::all();
        }

        return view('admin.interviews.index', compact('permintaans'));
    }

    public function create()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.interviews.create', compact('users'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->role == 'user') {
            $user_id = Auth::user()->id;
            $request->merge([
                'user_id' => $user_id
            ]);
        }
        // $hasil = $request->input('penampilan') + $request->input('kesopanan') + $request->input('komunikasi') + $request->input('daya_tangkap');
        // $request->merge([
        //     'hasil' => $hasil,
        //     'tanggal' => Carbon::now()
        // ]);
        // $interview = Interview::create($request->all());
        Permintaan::create($request->all());

        return redirect()->route('dashboard.perencanaans.index');
    }

    public function edit(Permintaan $interview)
    {
        $users = User::where('role', 'user')->get();

        return view('admin.interviews.edit', compact('users', 'interview'));
    }

    public function staffsetuju(Permintaan $interview)
    {
        $interview->update([
            'status' => 'setuju',
            'status_direktur' => 'pending'
        ]);
        if (Auth::user()->role == 'user') {
            $permintaans = Permintaan::where('user_id', Auth::user()->id)->get();
        } else {
            $permintaans = Permintaan::all();
        }

        return view('admin.interviews.index', compact('permintaans'));
    }

    public function direktursetuju(Permintaan $interview)
    {
        $interview->update([
            'nama_direktur' => Auth::user()->name,
            'status_direktur' => 'setuju',
            'tanggal_disetujui_direktur' => Carbon::now(),
        ]);
        if (Auth::user()->role == 'user') {
            $permintaans = Permintaan::where('user_id', Auth::user()->id)->get();
        } else {
            $permintaans = Permintaan::all();
        }

        return view('admin.interviews.index', compact('permintaans'));
    }

    public function update(Request $request, Permintaan $interview)
    {
        $interview->update($request->all());

        return redirect()->route('dashboard.perencanaans.index');
    }

    public function show(Interview $interview)
    {
        $interview->load('user', 'barang');
        $pelamars = User::where('role', 'user')->get();
        return view('admin.interviews.show', compact('interview', 'pelamars'));
    }

    public function destroy(Permintaan $interview)
    {
        $interview->delete();

        return back();
    }
}
