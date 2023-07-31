<?php

namespace App\Models;

use App\Models\User;
use DateTimeInterface;
use App\Models\AssetStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perancangan extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'promos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = ['id'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function permintaan()
    {
        return $this->belongsTo(Permintaan::class, 'permintaan_id');
    }
}