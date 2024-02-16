<?php

namespace App\Http\Controllers\Admin;

use App\Models\Asset;
use App\Models\Penerimaan;
use App\Models\AssetStatus;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use App\Models\AssetCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use App\Http\Requests\MassDestroyAssetRequest;
use App\Models\Permintaan;
use Symfony\Component\HttpFoundation\Response;

class AssetController extends Controller
{
    public function index()
    {
        $pengembalians = Pengembalian::all();

        return view('admin.assets.index', compact('pengembalians'));
    }

    public function create()
    {
        $barangs = Permintaan::all();

        return view('admin.assets.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'user_id' => auth()->id(),
            'status' => 'pending',
        ]);
        $asset = Pengembalian::create($request->all());


        return redirect()->route('dashboard.assets.index');
    }

    public function edit(Pengembalian $asset)
    {
        $barangs = Permintaan::all();

        return view('admin.assets.edit', compact('barangs', 'asset'));
    }

    public function disetujuidirektur(Pengembalian $asset)
    {
        $asset->update([
            'status' => 'setuju'
        ]);
        return redirect()->route('dashboard.assets.index');
    }

    public function update(Request $request, Pengembalian $asset)
    {
        $asset->update($request->all());

        return redirect()->route('dashboard.assets.index');
    }

    public function show(Asset $asset)
    {
        $asset->load('category');

        return view('admin.assets.show', compact('asset'));
    }

    public function destroy(Pengembalian $asset)
    {
        $asset->delete();

        return back();
    }
}
