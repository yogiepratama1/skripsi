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

    public $with = ['desain'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // public const SUDAH_DIKIRIM_RADIO = [
    //     '1' => 'Sudah Dikirim',
    //     '0' => 'Belum Dikirim',
    // ];

    protected $guarded = ['id'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function desain()
    {
        return $this->belongsTo(Interview::class, 'id_desain');
    }

    // public function barang()
    // {
    //     return $this->belongsTo(Asset::class, 'barang_id');
    // }

    // public function pembayaran()
    // {
    //     return $this->hasOne(Pembayaran::class);
    // }

    // public function aksesoris()
    // {
    //     return $this->belongsTo(AssetCategory::class, 'asset_categories_id');
    // }
}
