<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkOrderEvaluation extends Model
{
    public $fillable = [
        'code',
        'work_order_id',
        'qc_user_id',
        'status',
        'image_paths',
        'notes',
        'approved_at',
    ];

    protected $casts = [
        'image_paths' => 'array',
        'approved_at' => 'datetime',
    ];

    public const DIPROSES_TEKNISI = 'Diproses Teknisi';
    public const MENUNGGU_EVALUASI = 'Menunggu Evaluasi QC';
    public const REVISI_EVALUASI = 'Revisi';
    public const MENUNGGU_PERSETUJUAN_SUPERVISOR = 'Menunggu Persetujuan Supervisor';
    public const DISETUJUI_SUPERVISOR = 'Disetujui Supervisor';
    public static function boot()
    {
        parent::boot();

        // Pemeriksaan Pekerjaan
        // Automatically generate a unique code for the work order evaluation
        static::created(function ($model) {
            $model->code = 'PP-' . str_pad(
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
