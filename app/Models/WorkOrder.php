<?php

namespace App\Models;

use App\Models\User;
use App\Models\Customer;
use App\Models\WorkOrderApproval;
use App\Models\WorkOrderAssignee;
use App\Models\WorkOrderEvaluation;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    public $fillable = [
        'code',
        'coordinator_id',
        'customer_id',
        'status',
        'estimated_duration',
        'location',
        'installation_type',
        'description',
        'installation_date',
        'start_date',
        'end_date',
        'customer_signed_file_path'
    ];

    public $with = ['customer', 'assignee', 'evaluation', 'approval'];
    public $casts = [
        'installation_date' => 'datetime',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public const BELUM_DIMULAI = 'Belum Dimulai';
    public const DALAM_PROSES = 'Dalam Proses';
    public const SELESAI = 'Selesai';
    public const DIBATALKAN = 'Dibatalkan';
    public const STATUSES = [
        self::BELUM_DIMULAI,
        self::DALAM_PROSES,
        self::SELESAI,
        self::DIBATALKAN,
    ];

    public const INSTALATION_TYPES = [
        'Pemasangan Baru',
        'Perbaikan',
        'Perubahan Daya',
    ];

    public static function boot()
    {
        parent::boot();

        // Automatically generate a 3 digitsunique code for the work order
        static::created(function ($model) {
            $model->code = 'WO-' . str_pad(
                (string) $model->id,
                3,
                '0',
                STR_PAD_LEFT
            );
            $model->save();
        });
    }

    public function coordinator()
    {
        return $this->belongsTo(User::class, 'coordinator_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function assignee()
    {
        return $this->hasOne(WorkOrderAssignee::class);
    }

    public function evaluation()
    {
        return $this->hasOne(WorkOrderEvaluation::class);
    }

    public function approval()
    {
        return $this->hasOne(WorkOrderApproval::class);
    }

    public function statusCanChangeToInProgress($requestStatus)
    {
        return !empty($this->assignee) &&
            $requestStatus === self::DALAM_PROSES &&
            $this->status === self::BELUM_DIMULAI;
    }

    public function statusCanChangeToCompleted($requestStatus)
    {
        $evaluationStatusCompleted = $this->evaluation?->status === WorkOrderEvaluation::DISETUJUI_SUPERVISOR ?? false;
        $approvalStatusCompleted = $this->approval?->status === WorkOrderApproval::DISETUJUI ?? false;

        return $requestStatus === self::SELESAI &&
            $this->status === self::DALAM_PROSES &&
            $evaluationStatusCompleted &&
            $approvalStatusCompleted;
    }
}
