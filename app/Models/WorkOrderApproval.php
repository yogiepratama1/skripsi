<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkOrderApproval extends Model
{
    public $fillable = [
        'code',
        'work_order_id',
        'supervisor_user_id',
        'status',
        'approved_at',
        'notes'
    ];

    public const MENUNGGU_PERSETUJUAN = 'Menunggu Persetujuan';
    public const DISETUJUI = 'Disetujui';
    public const DITOLAK = 'Ditolak';

    public static function boot()
    {
        parent::boot();

        // Persetujuan Pekerjaan
        // Automatically generate a unique code for the work order approval
        static::created(function ($model) {
            $model->code = 'PK-' . str_pad(
                (string) $model->id,
                3,
                '0',
                STR_PAD_LEFT
            );
            $model->save();
        });
    }

    public function workOrder()
    {
        return $this->belongsTo(WorkOrder::class);
    }
}
