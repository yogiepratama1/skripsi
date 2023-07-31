<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssetStatusRequest;
use App\Http\Requests\StoreAssetStatusRequest;
use App\Http\Requests\UpdateAssetStatusRequest;
use App\Models\AssetStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssetStatusController extends Controller
{
    public function index()
    {
        $assetStatuses = AssetStatus::all();

        return view('admin.assetStatuses.index', compact('assetStatuses'));
    }

    public function create()
    {
        return view('admin.assetStatuses.create');
    }

    public function store(StoreAssetStatusRequest $request)
    {
        $assetStatus = AssetStatus::create($request->all());

        return redirect()->route('dashboard.asset-statuses.index');
    }

    public function edit(AssetStatus $assetStatus)
    {
        return view('admin.assetStatuses.edit', compact('assetStatus'));
    }

    public function update(UpdateAssetStatusRequest $request, AssetStatus $assetStatus)
    {
        $assetStatus->update($request->all());

        return redirect()->route('dashboard.asset-statuses.index');
    }

    public function show(AssetStatus $assetStatus)
    {
        return view('admin.assetStatuses.show', compact('assetStatus'));
    }

    public function destroy(AssetStatus $assetStatus)
    {
        $assetStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssetStatusRequest $request)
    {
        $assetStatuses = AssetStatus::find(request('ids'));

        foreach ($assetStatuses as $assetStatus) {
            $assetStatus->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}