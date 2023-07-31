<?php

namespace App\Http\Requests;

use App\Models\Pembayaran;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePembayaranRequest extends FormRequest
{
    public function rules()
    {
        return [
            'permintaan_id' => [
                'required',
                'integer',
            ],
            'tanggal_bayar' => [
                'nullable',
            ],
        ];
    }
}
