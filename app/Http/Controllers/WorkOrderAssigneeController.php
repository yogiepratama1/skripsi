<?php

namespace App\Http\Controllers;

use App\Models\WorkOrderEvaluation;
use Carbon\Carbon;
use App\Models\User;
use App\Models\WorkOrder;
use App\Models\Permintaan;
use App\Models\Perancangan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\WorkOrderAssignee;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermintaanRequest;

class WorkOrderAssigneeController extends Controller
{
    public function index()
    {
        $workOrderAssignees = WorkOrderAssignee::with('workOrder')->get();

        return view('admin.workOrderAssignees.index', compact('workOrderAssignees'));
    }

    public function create()
    {
        $workOrders = WorkOrder::whereDoesntHave('assignee')
            ->where('status', WorkOrder::BELUM_DIMULAI)
            ->get();
        $teknisi = User::where('role', 'teknisi')->get();

        return view('admin.workOrderAssignees.create', compact('teknisi', 'workOrders'));
    }

    public function kepuasan(Permintaan $permintaan)
    {
        return view('admin.workOrderAssignees.kepuasan', compact('permintaan'));
    }

    public function storeKepuasan(Request $request, Permintaan $permintaan)
    {
        $permintaan->update($request->all());

        return redirect()->route('dashboard.penugasan-teknisi.index');
    }

    public function store(Request $request)
    {
        if (empty($request->work_order_id)) {
            return redirect()
                ->back()
                ->withErrors(['errorMessage' => 'Pilih Work Order terlebih dahulu.']);
        }
        $request->merge(['assigneed_at' => Carbon::now()]);
        WorkOrderAssignee::create(attributes: $request->all());
        return redirect()->route('dashboard.penugasan-teknisi.index');
    }

    public function edit(WorkOrderAssignee $workOrderAssignee)
    {
        $workOrders = WorkOrder::where('id', $workOrderAssignee->work_order_id)
        ->get();
        $teknisi = User::where('role', 'teknisi')->get();
        return view('admin.workOrderAssignees.edit', compact(['workOrderAssignee','workOrders', 'teknisi']));
    }

    public function mulai(WorkOrderAssignee $workOrderAssignee)
    {
        $workOrderEvaluation = new WorkOrderEvaluation();
        $workOrderEvaluation->work_order_id = $workOrderAssignee->work_order_id;
        $workOrderEvaluation->qc_user_id = User::where('role', 'quality_control')->first()->id;
        $workOrderEvaluation->status = WorkOrderEvaluation::DIPROSES_TEKNISI;
        $workOrderEvaluation->save();
        $workOrderAssignee->workOrder->status = WorkOrder::DALAM_PROSES;
        $workOrderAssignee->workOrder->save();

        return redirect()->route('dashboard.penugasan-teknisi.index')
            ->with('successMessage', 'Work Order telah dimulai.');
    }

    public function perancangan(Permintaan $permintaan)
    {
        $count = 0;
        $perancangan = Perancangan::where('permintaan_id', $permintaan->id)->count();
        if ($perancangan > 0) {
            $count = $perancangan;
            $perancangan = Perancangan::where('permintaan_id', $permintaan->id)->first();
        }
        return view('admin.perancangans.index', compact('permintaan', 'count', 'perancangan'));
    } 

    public function update(Request $request, WorkOrderAssignee $workOrderAssignee)
    {
        if ($workOrderAssignee->workOrder->status != WorkOrder::BELUM_DIMULAI) {
            return redirect()
                ->back()
                ->withErrors(['errorMessage' => 'Tidak dapat merubah teknisi karena work order sudah dalam proses. Silahkan kembali ke halaman sebelumnya.']);
        }
        DB::beginTransaction();
        $workOrderAssignee->update($request->except('work_order_id'));
        DB::commit();
        return redirect()->route('dashboard.penugasan-teknisi.index');
    }

    // public function show(Permintaan $permintaan)
    // {
    //     $permintaan->load('user');

    //     return view('admin.workOrderAssignees.show', compact('permintaan'));
    // }

    public function destroy(WorkOrderAssignee $workOrderAssignee)
    {
        if (!$workOrderAssignee->canBeDeletedOrEdited()) {
            return redirect()
                ->back()
                ->withErrors(['errorMessage' => 'Penugasan teknisi tidak dapat dihapus karena work order sudah dimulai atau telah selesai.']);
        }
        $workOrderAssignee->delete();

        return back();
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
