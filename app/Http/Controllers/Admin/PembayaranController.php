<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPembayaranRequest;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Models\Pembayaran;
use App\Models\Permintaan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('permintaan')->get();

        return view('admin.pembayarans.index', compact('pembayarans'));
    }

    public function create()
    {
        $permintaans = Permintaan::pluck('nama_pelanggan', 'id')->prepend('Please Select', '');

        return view('admin.pembayarans.create', compact('permintaans'));
    }

    public function store(StorePembayaranRequest $request)
    {
        $pembayaran = Pembayaran::create($request->all());

        return redirect()->route('dashboard.pembayarans.index');
    }

    public function edit(Pembayaran $pembayaran)
    {
        $permintaans = Permintaan::pluck('nama_pelanggan', 'id')->prepend('Please Select', '');

        $pembayaran->load('permintaan');

        return view('admin.pembayarans.edit', compact('pembayaran', 'permintaans'));
    }

    public function update(UpdatePembayaranRequest $request, Pembayaran $pembayaran)
    {
        $pembayaran->update($request->all());

        return redirect()->route('dashboard.pembayarans.index');
    }

    public function show(Pembayaran $pembayaran)
    {
        $pembayaran->load('permintaan');

        return view('admin.pembayarans.show', compact('pembayaran'));
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return back();
    }

    public function massDestroy(MassDestroyPembayaranRequest $request)
    {
        Pembayaran::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
