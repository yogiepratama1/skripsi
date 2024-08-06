<?php

namespace App\Models;

use App\Models\User;
use App\Models\Absensi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AbsensiSiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function absensi()
    {
        return $this->belongsTo(Absensi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
