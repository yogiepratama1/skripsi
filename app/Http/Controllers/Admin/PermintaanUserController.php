<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Asset;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use App\Models\PermintaanUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermintaanRequest;

class PermintaanUserController extends Controller
{
    public function index()
    {
        if (auth()->user()->role != 'user') {
            $permintaans = Permintaan::all();
        } else {
            $permintaans = Permintaan::where('user_id', auth()->id())->get();
        }

        return view('admin.permintaans.index', compact('permintaans'));
    }

    public function create()
    {
        // $assets = Asset::all();
        $users = User::where('role', 'user')->get();
        return view('admin.permintaans.create', compact('users'));
    }

    public function store(Request $request)
    {
        // if ($request->hasFile('bukti_pembayaran')) {
        //     $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        //     $request->merge(['bukti_pembayaran' => $path]);
        // }
        
        // if ($request->has('spareparts')) {
        //     $sparepartsString = implode(',', $request->spareparts ?? []);

        //     $request->merge(['spareparts' => $sparepartsString]);
        // }

        
        $request->merge(['user_id' => auth()->id()]);
        
        $permintaan = Permintaan::create($request->all());
        if ($request->has('peserta') && !empty($request->peserta)) {
            foreach ($request->peserta as $id) {
                PermintaanUser::create([
                    'user_id'=> $id,
                    'permintaan_id' => $permintaan->id,
                ]);
            }
        }
        return redirect()->route('dashboard.permintaans.index');
    }

    public function edit(Permintaan $permintaan)
    {
        $users = User::where('role', 'user')->get();

        return view('admin.permintaans.edit', compact('permintaan', 'users'));
    }
    public function bayar(Permintaan $permintaan)
    {
        $permintaan->update([
            'status' => 'Disetujui'
        ]);
        return redirect()->route('dashboard.permintaans.index');
    }

    public function update(Request $request, Permintaan $permintaan)
    {
        if ($request->input('tanggal_bayar')){
            $tanggalBayar = Carbon::createFromFormat('Y-m-d', $request->input('tanggal_bayar'))->format('Y-m-d');
            $request->merge(['tanggal_bayar' => $tanggalBayar]);
        }

        if ($request->hasFile('bukti_pembayaran')) {
            // Mengambil nama file asli
            $originalName = $request->file('bukti_pembayaran')->getClientOriginalName();
            // Menyimpan file dengan nama asli di folder 'uploads'
            $filePath = $request->file('bukti_pembayaran')->storeAs('uploads', $originalName, 'public');

            $permintaan->bukti_pembayaran = $filePath;
            $permintaan->save();
        }

        if ($request->has('spareparts')) {
            $sparepartsString = implode(',', $request->spareparts ?? []);

            $request->merge(['spareparts' => $sparepartsString]);
        }

        $permintaan->update($request->except('bukti_pembayaran'));
        if ($request->has('peserta') && !empty($request->peserta)) {
            foreach ($request->peserta as $id) {
                PermintaanUser::updateOrCreate([
                    'user_id'=> $id,
                    'permintaan_id' => $permintaan->id,
                ]);
            }
        }


        return redirect()->route('dashboard.permintaans.index');
    }

    public function show(Permintaan $permintaan)
    {
        $permintaan->load('peserta');

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
