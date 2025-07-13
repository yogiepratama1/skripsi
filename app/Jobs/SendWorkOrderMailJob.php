<?php

namespace App\Jobs;

use App\Models\WorkOrder;
use App\Mail\WorkOrderEnded;
use Illuminate\Bus\Queueable;
use App\Mail\WorkOrderAssigned;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendWorkOrderMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public array $emails;
    public WorkOrder $workOrder;

    public function __construct(WorkOrder $workOrder, array $emails)
    {
        $this->emails     = $emails;
        $this->workOrder  = $workOrder;
    }

    public function handle(): void
    {
        foreach ($this->emails as $email) {
            if ($this->workOrder->status == WorkOrder::SELESAI) {
                Mail::to($email)->send(new WorkOrderEnded($this->workOrder, $email));
            } else {
                Mail::to($email)->send(new WorkOrderAssigned($this->workOrder, $email));
            }
        }
    }
}
