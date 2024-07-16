<?php

namespace App\Models;

use DateTimeInterface;
use App\Models\Pembayaran;
use App\Models\AssetCategory;
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
    protected $guarded = ['id'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function barangs()
    {
        return $this->hasMany(Asset::class, 'id_permintaan', 'id');
    }
}