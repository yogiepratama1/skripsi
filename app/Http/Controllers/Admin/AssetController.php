<?php

namespace App\Http\Controllers\Admin;

use App\Models\Asset;
use App\Models\Permintaan;
use App\Models\AssetStatus;
use Illuminate\Http\Request;
use App\Models\AssetCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use App\Http\Requests\MassDestroyAssetRequest;
use Symfony\Component\HttpFoundation\Response;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::with('permintaan')->get();
        return view('admin.assets.index', compact('assets'));
    }

    public function create()
    {
        $permintaans = Permintaan::pluck('nama_penyidik', 'id')->prepend('Please Select', '');

        return view('admin.assets.create', compact('permintaans'));
    }

    public function store(Request $request)
    {
        $asset = Asset::create($request->all());
        return redirect()->route('dashboard.assets.index');
    }

    public function edit(Asset $asset)
    {
        $permintaans = Permintaan::pluck('nama_penyidik', 'id')->prepend('Please Select', '');

        return view('admin.assets.edit', compact('asset', 'permintaans'));
    }

    public function update(Request $request, Asset $asset)
    {
        $asset->update($request->all());

        return redirect()->route('dashboard.assets.index');
    }

    public function terimabarang(Request $request, Asset $asset)
    {
        $asset->update([
            'status' => 3
        ]);

        return redirect()->route('dashboard.assets.index');
    }

    public function show(Asset $asset)
    {
        return view('admin.assets.show', compact('asset'));
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssetRequest $request)
    {
        $assets = Asset::find(request('ids'));

        foreach ($assets as $asset) {
            $asset->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
