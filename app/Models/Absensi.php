<?php

namespace App\Models;

use App\Models\Asset;
use App\Models\AbsensiSiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function absenSiswa()
    {
        return $this->hasMany(AbsensiSiswa::class)->where('user_id', auth()->id());
    }
}
