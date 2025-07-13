<?php

namespace App\Http\Controllers;

use App\Jobs\SendWorkOrderMailJob;
use \PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\WorkOrder;
use App\Models\Permintaan;
use App\Models\Perancangan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Mail\WorkOrderAssigned;
use App\Models\WorkOrderAssignee;
use Illuminate\Support\Facades\DB;
use App\Models\WorkOrderEvaluation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\MassDestroyPermintaanRequest;

class WorkOrderAssigneeController extends Controller
{
    public function index()
    {
        $workOrderAssignees = WorkOrderAssignee::with('workOrder.evaluation')
            ->whereHas('workOrder', function ($query) {
                $query->where('status', '!=', WorkOrder::DIBATALKAN);
            })
            ->get();
        if (auth()->user()->role === 'teknisi') {
            $workOrderAssignees = WorkOrderAssignee::filterByAssignee(auth()->user()->id)
                ->with('workOrder.evaluation')
                ->get();
        }

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
        $assigneeIds = array_map(function ($id) {
            return (int) $id;
        }, $request->assignee_ids);
        $emails = User::whereIn('id', $assigneeIds)->get()->pluck('email')->toArray();
        $workOrder = WorkOrder::find($request->work_order_id);
        SendWorkOrderMailJob::dispatch($workOrder, $emails);

        return redirect()->route('dashboard.penugasan-teknisi.index');
    }

    public function edit(WorkOrderAssignee $workOrderAssignee)
    {
        $workOrders = WorkOrder::where('id', $workOrderAssignee->work_order_id)
        ->get();
        $teknisi = User::where('role', 'teknisi')->get();
        return view('admin.workOrderAssignees.edit', compact(['workOrderAssignee','workOrders', 'teknisi']));
    }

    public function selesaikan(WorkOrderAssignee $workOrderAssignee)
    {
        $workOrderAssignee->load('workOrder.evaluation');
        return view('admin.workOrderAssignees.selesaikan', compact(['workOrderAssignee']));
    }

    public function selesaikanUpdate(WorkOrderAssignee $workOrderAssignee, Request $request)
    {
        $images = $request->file('images');
        $imagePaths = $workOrderAssignee->workOrder->evaluation->image_paths ?? [];
        if ($images) {
            foreach ($images as $image) {
                $imagePath = $image->store('work_order_images', 'public');
                $imagePaths[] = $imagePath;
            }
        }

        $evaluation = WorkOrderEvaluation::where('work_order_id', $workOrderAssignee->work_order_id)->first();
        if (!$evaluation) {
            return redirect()
                ->back()
                ->withErrors(['errorMessage' => 'Work Order Evaluation tidak ditemukan.']);
        }

        $evaluation->update([
            'status' => WorkOrderEvaluation::MENUNGGU_EVALUASI,
            'image_paths' => $imagePaths,
            'description' => $request->description,
        ]);

        // Rename file with "signed_" prefix
        $customerSignedFile = $request->file('customer_signed_file');
        if ($customerSignedFile) {
            $originalName = $customerSignedFile->getClientOriginalName();
            $signedFileName = 'signed_' . $originalName;
            $customerSignedFilePath = $customerSignedFile->storeAs('customer_signed_files', $signedFileName, 'public');
            $evaluation->workOrder->update([
                'customer_signed_file_path' => $customerSignedFilePath,
            ]);
        }

        return redirect()->route('dashboard.penugasan-teknisi.index')->with('successMessage', 'Work Order telah diupdate.');
    }


    public function mulai(WorkOrderAssignee $workOrderAssignee)
    {
        if ($workOrderAssignee->workOrder->status == WorkOrder::DALAM_PROSES) {
            return redirect()
                ->back()
                ->withErrors(['errorMessage' => 'Work Order sudah dimulai. Silahkan kembali ke halaman sebelumnya.']);
        }

        $workOrderEvaluation = new WorkOrderEvaluation();
        $workOrderEvaluation->work_order_id = $workOrderAssignee->work_order_id;
        $workOrderEvaluation->qc_user_id = User::where('role', 'quality_control')->first()->id;
        $workOrderEvaluation->status = WorkOrderEvaluation::DIPROSES_TEKNISI;
        $workOrderEvaluation->save();
        $workOrderAssignee->workOrder->status = WorkOrder::DALAM_PROSES;
        $workOrderAssignee->workOrder->start_date = Carbon::now();
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
