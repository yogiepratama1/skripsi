<?php

namespace App\Models;

use DateTimeInterface;
use App\Models\Pembayaran;
use App\Models\AssetCategory;
use App\Models\PermintaanUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permintaan extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'permintaans';
    protected $with = ['user', 'peserta'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'tanggal_bayar'
    ];

    public const SUDAH_DIKIRIM_RADIO = [
        '1' => 'Sudah Dikirim',
        '0' => 'Belum Dikirim',
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_bayar' => 'date',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function peserta()
    {
        return $this->hasMany(PermintaanUser::class, 'permintaan_id');
    }

    // public function getBuktiPembayaranAttribute($value)
    // {
    //     return json_decode($value);
    // }
}