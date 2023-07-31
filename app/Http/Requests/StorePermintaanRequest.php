<?php

namespace App\Http\Requests;

use App\Models\Permintaan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePermintaanRequest extends FormRequest
{
    public function rules()
    {
        return [
            'barang_id' => [
                'required',
                'integer',
            ],
            'nama_pelanggan' => [
                'string',
                'required',
            ],
            'alamat_pelanggan' => [
                'string',
                'required',
            ],
        ];
    }
}