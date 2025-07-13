<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id', 'nama_lengkap', 'alamat', 'nomor_telepon', 'foto_profil',
];

}
