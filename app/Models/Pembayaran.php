<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembayaran extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'pembayarans';

    public const SUDAH_BAYAR_RADIO = [
        '1' => 'Sudah Bayar',
        '0' => 'Belum Bayar',
    ];

    protected $dates = [
        'tanggal_bayar',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'permintaan_id',
        'tanggal_bayar',
        'harga_dibayar',
        'sudah_bayar',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function permintaan()
    {
        return $this->belongsTo(Permintaan::class, 'permintaan_id');
    }
}