<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AssetCategory;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class AssetCategoryController extends Controller
{
    public function index()
    {
        $assetCategories = AssetCategory::all();

        return view('admin.assetCategories.index', compact('assetCategories'));
    }

    public function create()
    {
        return view('admin.assetCategories.create');
    }

    public function store(Request $request)
    {
        $AssetCategory = AssetCategory::create($request->all());

        return redirect()->route('dashboard.asset-categories.index');
    }

    public function edit(AssetCategory $assetCategory)
    {
        return view('admin.assetCategories.edit', compact('assetCategory'));
    }

    public function update(Request $request, AssetCategory $AssetCategory)
    {
        $AssetCategory->update($request->all());

        return redirect()->route('dashboard.asset-categories.index');
    }

    public function show(AssetCategory $AssetCategory)
    {
        return view('admin.assetCategories.show', compact('assetCategory'));
    }

    public function destroy(AssetCategory $AssetCategory)
    {
        $AssetCategory->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        $assetCategories = AssetCategory::find(request('ids'));

        foreach ($assetCategories as $AssetCategory) {
            $AssetCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
