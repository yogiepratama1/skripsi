<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permintaan extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'permintaans';
    // protected $with = ['user', 'barang', 'pembayaran', 'aksesoris'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $guarded = ['id'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
