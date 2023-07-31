<?php

namespace App\Http\Requests;

use App\Models\Asset;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssetRequest extends FormRequest
{
    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
            ],
            'harga' => [
                'required',
            ],
        ];
    }
}