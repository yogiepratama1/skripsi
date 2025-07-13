<?php

namespace App\Http\Controllers;

use App\Jobs\SendWorkOrderMailJob;
use App\Models\User;
use Carbon\Carbon;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use App\Models\WorkOrderEvaluation;

class WorkOrderEvaluationController extends Controller
{
    public function index()
    {
        $workOrderEvaluations = WorkOrderEvaluation::with('workOrder')->get();

        return view('admin.persetujuanWorkOrder.index', compact('workOrderEvaluations'));
    }

    public function create()
    {
        $workOrders = WorkOrder::whereDoesntHave('assignee')
            ->where('status', WorkOrder::BELUM_DIMULAI)
            ->get();
        $teknisi = User::where('role', 'teknisi')->get();

        return view('admin.persetujuanWorkOrder.create', compact('teknisi', 'workOrders'));
    }

    public function show(WorkOrderEvaluation $workOrderEvaluation)
    {
        $workOrderEvaluation->load('workOrder');
        return view('admin.persetujuanWorkOrder.show', compact('workOrderEvaluation'));
    }

    public function setujui(WorkOrderEvaluation $workOrderEvaluation, Request $request)
    {
        if ($workOrderEvaluation->status == WorkOrderEvaluation::DISETUJUI_SUPERVISOR) {
            return redirect()
                ->back()
                ->withErrors(['errorMessage' => 'Work Order sudah disetujui.']);
        }
        $workOrderEvaluation->status = auth()->user()->role === 'supervisor' ?
            WorkOrderEvaluation::DISETUJUI_SUPERVISOR :
            WorkOrderEvaluation::MENUNGGU_PERSETUJUAN_SUPERVISOR;
        $workOrderEvaluation->approved_at = Carbon::now();
        $workOrderEvaluation->notes = $request->notes ?? null;
        $workOrderEvaluation->save();

        if ($workOrderEvaluation->status == WorkOrderEvaluation::DISETUJUI_SUPERVISOR) {
            $workOrderEvaluation->workOrder->status = WorkOrder::SELESAI;
            $workOrderEvaluation->workOrder->end_date = Carbon::now();
            $workOrderEvaluation->workOrder->save();

            $email = User::where('id', $workOrderEvaluation->workOrder->coordinator_id)->first()->email;
            SendWorkOrderMailJob::dispatch($workOrderEvaluation->workOrder, [$email]);

            return redirect()->route('dashboard.persetujuan-work-order.index')
                ->with('successMessage', 'Work Order telah disetujui dan selesai.');
        }

        return redirect()->route('dashboard.persetujuan-work-order.index')
            ->with('successMessage', 'Work Order telah disetujui. Silahkan menunggu persetujuan supervisor.');
    }
    public function revisi(WorkOrderEvaluation $workOrderEvaluation, Request $request)
    {
        if ($workOrderEvaluation->status == WorkOrderEvaluation::REVISI_EVALUASI) {
            return redirect()
                ->back()
                ->withErrors(['errorMessage' => 'Work Order status sudah menjadi revisi.']);
        }

        $workOrderEvaluation->status = WorkOrderEvaluation::REVISI_EVALUASI;
        $workOrderEvaluation->notes = $request->notes ?? null;
        $workOrderEvaluation->save();

        return redirect()->route('dashboard.persetujuan-work-order.index')
            ->with('successMessage', 'Work Order telah direvisi. Silahkan menunggu teknisi melakukan revisi.');
    }

    // public function massDestroy(MassDestroyPermintaanRequest $request)
    // {
    //     $permintaans = WorkOrderAssignee::find(request('ids'));

    //     foreach ($permintaans as $permintaan) {
    //         $permintaan->delete();
    //     }

    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}
