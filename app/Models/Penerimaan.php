<?php

namespace App\Models;

use App\Models\Permintaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penerimaan extends Model
{
    use HasFactory;

    public $table = 'penerimaans';

    protected $guarded = ['id'];

    public function barang()
    {
        return $this->belongsTo(Permintaan::class, 'barang_id');
    }
}
