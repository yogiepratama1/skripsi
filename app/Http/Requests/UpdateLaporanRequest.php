<?php

namespace App\Http\Requests;

use App\Models\Laporan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLaporanRequest extends FormRequest
{
    public function rules()
    {
        return [
            'permintaan_id' => [
                'required',
                'integer',
            ],
        ];
    }
}