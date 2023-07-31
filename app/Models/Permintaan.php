<?php

namespace App\Models;

use DateTimeInterface;
use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permintaan extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'permintaans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const SUDAH_DIKIRIM_RADIO = [
        '1' => 'Sudah Dikirim',
        '0' => 'Belum Dikirim',
    ];

    protected $fillable = [
        'user_id',
        'barang_id',
        'nama_pelanggan',
        'alamat_pelanggan',
        'sudah_dikirim',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function barang()
    {
        return $this->belongsTo(Asset::class, 'barang_id');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}