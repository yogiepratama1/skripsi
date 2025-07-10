<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Perancangan;
use App\Models\Permintaan;
use App\Models\User;
use App\Models\WorkOrder;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkOrderController extends Controller
{
    public function index()
    {
        $workOrders = WorkOrder::with('customer')->get();

        return view('admin.permintaans.index', compact('workOrders'));
    }

    public function create()
    {
        $installationTypes = WorkOrder::INSTALATION_TYPES;

        return view('admin.permintaans.create', compact('installationTypes'));
    }

    public function kepuasan(Permintaan $permintaan)
    {
        return view('admin.permintaans.kepuasan', compact('permintaan'));
    }

    public function storeKepuasan(Request $request, Permintaan $permintaan)
    {
        $permintaan->update($request->all());

        return redirect()->route('dashboard.permintaans.index');
    }

    public function store(Request $request)
    {
        $customer = Customer::create($request->all());
        $request->merge(['customer_id' => $customer->id, 'status' => 'Belum Dimulai']);
        WorkOrder::create(attributes: $request->all());

        return redirect()->route('dashboard.permintaans.index');
    }

    public function edit(WorkOrder $workOrder)
    {
        $workOrder->load('customer');
        $workOrderStatuses = WorkOrder::STATUSES;
        $installationTypes = WorkOrder::INSTALATION_TYPES;
        return view('admin.permintaans.edit', compact(['workOrder', 'workOrderStatuses', 'installationTypes']));
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


    public function update(Request $request, WorkOrder $workOrder)
    {
        if ($request->status == WorkOrder::DALAM_PROSES && !$workOrder->statusCanChangeToInProgress($request->status)) {
            return redirect()
                ->back()
                ->withErrors(['errorMessage' => 'Work order ini tidak dapat dimulai karena belum menugaskan teknisi.']);
        }
        if ($request->status == WorkOrder::SELESAI && !$workOrder->statusCanChangeToCompleted($request->status)) {
            if ($workOrder->status == WorkOrder::BELUM_DIMULAI) {
                return redirect()
                    ->back()
                    ->withErrors(['errorMessage' => 'Work order ini tidak dapat diselesaikan karena belum dimulai.']);
            }
            return redirect()
                ->back()
                ->withErrors(['errorMessage' => 'Work order ini tidak dapat diselesaikan karena masih dalam proses.']);
        }
        DB::beginTransaction();
        Customer::find($workOrder->customer_id)->update($request->all());
        $workOrder->update($request->all());
        DB::commit();
        return redirect()->route('dashboard.permintaans.index');
    }

    // public function show(Permintaan $permintaan)
    // {
    //     $permintaan->load('user');

    //     return view('admin.permintaans.show', compact('permintaan'));
    // }

    public function destroy(WorkOrder $workOrder)
    {
        $workOrder->delete();

        return back();
    }

    // public function massDestroy(MassDestroyPermintaanRequest $request)
    // {
    //     $permintaans = WorkOrder::find(request('ids'));

    //     foreach ($permintaans as $permintaan) {
    //         $permintaan->delete();
    //     }

    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}

