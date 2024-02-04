<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MassDestroyinterviewRequest;
use Carbon\Carbon;

class InterviewController extends Controller
{
    public function index()
    {
        $interviews = Interview::all();
        if (Auth::user()->role == 'user') {
            $interviews = Interview::where('user_id', Auth::user()->id)->get();
        }

        return view('admin.interviews.index', compact('interviews'));
    }

    public function create()
    {
        $pelamars = User::where('role', 'user')->get();
        return view('admin.interviews.create', compact('pelamars'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->role == 'user') {
            $user_id = Auth::user()->id;
            $request->merge([
                'user_id' => $user_id
            ]);
        }
        $hasil = $request->input('penampilan') + $request->input('kesopanan') + $request->input('komunikasi') + $request->input('daya_tangkap');
        $request->merge([
            'hasil' => $hasil,
            'tanggal' => Carbon::now()
        ]);
        $interview = Interview::create($request->all());

        return redirect()->route('dashboard.interviews.index');
    }

    public function edit(Interview $interview)
    {
        // $users = User::where('role', 'sales')->pluck('name', 'id')->prepend('Please Select', '');

        // $barangs = Asset::pluck('name', 'id')->prepend('Please Select', '');
        // $aksesoris = AssetCategory::pluck('name', 'id')->prepend('Please Select', '');

        $pelamars = User::where('role', 'user')->get();

        return view('admin.interviews.edit', compact('interview', 'pelamars'));
    }

    public function update(Request $request, Interview $interview)
    {
        $hasil = $request->input('penampilan') + $request->input('kesopanan') + $request->input('komunikasi') + $request->input('daya_tangkap');
        $request->merge([
            'hasil' => $hasil,
            'tanggal' => Carbon::now()
        ]);
        $interview->update($request->all());

        return redirect()->route('dashboard.interviews.index');
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
