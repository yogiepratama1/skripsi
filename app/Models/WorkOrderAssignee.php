<?php

namespace App\Models;

use App\Models\WorkOrder;
use Illuminate\Database\Eloquent\Model;

class WorkOrderAssignee extends Model
{
    public $fillable = [
        'code',
        'work_order_id',
        'assignee_ids',
        'assigned_at',
    ];

    public $casts = [
        'assignee_ids' => 'array',
        'assigned_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        // Penugasan Teknisi
        // Automatically generate a unique code for the work order assignee
        static::created(function ($model) {
            $model->code = 'PT-' . str_pad(
                (string) $model->id,
                3,
                '0',
                STR_PAD_LEFT
            );
            $model->save();
        });
    }

    public function getAssigneeNamesAttribute()
    {
        $userNames = User::whereIn('id', $this->assignee_ids)->get('name')->toArray();
        $userNames = array_map(function ($user) {
            return $user['name'];
        }, $userNames);
        return implode(',', $userNames);
    }

    public function workOrder()
    {
        return $this->belongsTo(WorkOrder::class);
    }

    public function canBeDeletedOrEdited()
    {
        return $this->workOrder->status === WorkOrder::BELUM_DIMULAI;
    }
}
