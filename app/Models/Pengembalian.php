<?php

namespace App\Models;

use App\Models\Laporan;
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

    public function laporan()
    {
        return $this->hasOne(Laporan::class, 'pengembalian_id');
    }
}
