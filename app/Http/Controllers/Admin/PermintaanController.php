<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Asset;
use App\Models\Laporan;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use App\Models\AssetCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MassDestroyPermintaanRequest;

class PermintaanController extends Controller
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
        $assets = Asset::all();
        return view('admin.permintaans.create', compact('assets'));
    }

    public function store(Request $request)
    {
        // if ($request->hasFile('bukti_pembayaran')) {
        //     $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        //     $request->merge(['bukti_pembayaran' => $path]);
        // }
        
        if ($request->has('produk')) {
            $produkString = implode(',', $request->produk ?? []);

            $request->merge(['produk' => $produkString]);
        }

        $request->merge(['user_id' => auth()->id()]);

        $permintaan = Permintaan::create($request->all());
        // dd($permintaan);
        return redirect()->route('dashboard.permintaans.index');
    }

    public function edit(Permintaan $permintaan)
    {
        $assets = Asset::all();

        return view('admin.permintaans.edit', compact('permintaan', 'assets'));
    }

    public function setujui(Permintaan $permintaan)
    {
        $permintaan->update([
            'status' => 1
        ]);

        return redirect()->route('dashboard.permintaans.index');

    }
    public function bayar(Permintaan $permintaan)
    {
        return view('admin.permintaans.bayar', compact('permintaan'));
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

        if ($request->has('produk')) {
            $produkString = implode(',', $request->produk ?? []);

            $request->merge(['produk' => $produkString]);
        }

        $permintaan->update($request->except('bukti_pembayaran'));

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

