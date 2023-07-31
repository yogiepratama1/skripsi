<?php

namespace App\Models;

use DateTimeInterface;
use App\Models\Perancangan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permintaan extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'permintaans';
    // public $with = ['perancangan'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const SUDAH_DIMULAI_RADIO = [
        '1' => 'Konstruksi Sudah Dimulai',
        '0' => 'Konstruksi Belum Dimulai',
    ];

    protected $guarded = ['id'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function perancangan()
    // {
    //     return $this->hasOne(Perancangan::class, 'permintaan_id');
    // }
}