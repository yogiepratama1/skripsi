<?php

namespace App\Http\Requests;

use App\Models\AssetCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAssetCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:asset_categories,id',
        ];
    }
}