<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Interview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PerencanaanController extends Controller
{
    public function index()
    {
        $perencanaans = Interview::all();
        // if (Auth::user()->role == 'user') {
        //     $interviews = Interview::where('user_id', Auth::user()->id)->get();
        // }

        return view('admin.interviews.index', compact('perencanaans'));
    }

    public function create()
    {
        // $pelamars = User::where('role', 'user')->get();
        return view('admin.interviews.create');
    }

    public function store(Request $request)
    {
        // if (Auth::user()->role == 'user') {
        //     $user_id = Auth::user()->id;
        //     $request->merge([
        //         'user_id' => $user_id
        //     ]);
        // }
        // $hasil = $request->input('penampilan') + $request->input('kesopanan') + $request->input('komunikasi') + $request->input('daya_tangkap');
        // $request->merge([
        //     'hasil' => $hasil,
        //     'tanggal' => Carbon::now()
        // ]);
        $interview = Interview::create($request->all());

        return redirect()->route('dashboard.perencanaans.index');
    }

    public function edit(Interview $interview)
    {
        // $users = User::where('role', 'sales')->pluck('name', 'id')->prepend('Please Select', '');

        // $barangs = Asset::pluck('name', 'id')->prepend('Please Select', '');
        // $aksesoris = AssetCategory::pluck('name', 'id')->prepend('Please Select', '');

        // $pelamars = User::where('role', 'user')->get();

        return view('admin.interviews.edit', compact('interview'));
    }

    public function update(Request $request, Interview $interview)
    {
        // $hasil = $request->input('penampilan') + $request->input('kesopanan') + $request->input('komunikasi') + $request->input('daya_tangkap');
        // $request->merge([
        //     'hasil' => $hasil,
        //     'tanggal' => Carbon::now()
        // ]);
        $interview->update($request->all());

        return redirect()->route('dashboard.perencanaans.index');
    }

    public function show(Interview $interview)
    {
        $interview->load('user', 'barang');
        $pelamars = User::where('role', 'user')->get();
        return view('admin.interviews.show', compact('interview', 'pelamars'));
    }

    public function destroy(Interview $interview)
    {
        $interview->delete();

        return back();
    }
}
