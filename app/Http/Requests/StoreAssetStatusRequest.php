<?php

namespace App\Http\Requests;

use App\Models\AssetStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAssetStatusRequest extends FormRequest
{
   public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}