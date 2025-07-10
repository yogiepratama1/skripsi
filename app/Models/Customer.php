<?php

namespace App\Models;

use App\Models\WorkOrder;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $fillable = [
        'code',
        'name',
        'location',
        'phone',
    ];

    public static function boot()
    {
        parent::boot();

        // Automatically generate a unique code for the customer
        static::created(function ($model) {
            $model->code = 'CUST-' . str_pad(
                (string) $model->id,
                3,
                '0',
                STR_PAD_LEFT
            );
        });
    }

    public function workOrders()
    {
        return $this->hasMany(WorkOrder::class);
    }
}
