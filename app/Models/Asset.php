<?php

namespace App\Models;

use DateTimeInterface;
use App\Models\AssetStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asset extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'assets';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'category_id',
        'name',
        'harga',
        'deskripsi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function category()
    {
        return $this->belongsTo(AssetCategory::class, 'category_id');
    }

    public function status()
    {
        return $this->belongsTo(AssetStatus::class, 'status_id');
    }
}