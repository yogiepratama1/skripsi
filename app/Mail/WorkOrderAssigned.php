<?php

namespace App\Mail;

use App\Models\WorkOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WorkOrderAssigned extends Mailable
{
    use Queueable, SerializesModels;

    public WorkOrder $workOrder;
    public string $email;

    public function __construct(WorkOrder $workOrder, $email)
    {
        $this->workOrder = $workOrder;
        $this->email = $email;
    }

    public function build()
    {
        $pdf = \PDF::loadView('admin.workOrderAssignees.work-order', [
            'workOrder' => $this->workOrder,
        ]);

        return $this->to($this->email) // <-- atau inject dari controller
            ->subject('Penugasan Work Order #' . ($this->workOrder->code ?? ''))
            ->view('admin.workOrderAssignees.work_order_assigned')
            ->attachData($pdf->output(), 'work-order-'.$this->workOrder->code.'.pdf', [
                'mime' => 'application/pdf',
            ])
            ->with([
                'workOrder' => $this->workOrder,
            ]);
    }
}