<?php

namespace App\Models;

use App\Models\Permintaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengembalian extends Model
{
    use HasFactory;

    public $table = 'pengembalians';

    protected $guarded = ['id'];

    public function barang()
    {
        return $this->belongsTo(Permintaan::class, 'barang_id');
    }
}
