<?php

namespace App\Http\Controllers\Admin;

use \PDF;
use App\Models\Penilaian;
use App\Models\WorkOrder;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index()
    {
        $workOrders = WorkOrder::where('status', WorkOrder::SELESAI)->get();
        return view('admin.laporans.index', compact('workOrders'));
    }

    public function createDetail(WorkOrder $workOrder)
    {
        $pdf = PDF::loadView('admin.laporans.detail', compact('workOrder'));
        $pdf->setPaper('a4', 'portrait');
        $fileName = 'laporan-detail-' . $workOrder->code . '.pdf';
        return $pdf->download($fileName);
    }

    public function createList(Request $request)
    {
        $start = $request->start_date;
        $end   = $request->end_date;

        // Jika start > end, return back dengan error
        if ($start > $end) {
            return back()->with([
                'errorMessage' => 'Tanggal mulai tidak boleh lebih besar dari tanggal selesai.',
                'custom_type' => 'danger'
            ]);
        }

        // Ambil work order yang selesai dan approved_at sesuai range
        $workOrders = WorkOrder::where('status', WorkOrder::SELESAI)
            ->whereHas('evaluation', function($q) use ($start, $end) {
                $q->whereDate('approved_at', '>=', $start)
                ->whereDate('approved_at', '<=', $end);
            })
            ->get();

        // Jika tidak ada data, return back dengan info
        if ($workOrders->isEmpty()) {
            return back()->with([
                'errorMessage' => 'Data laporan tidak ditemukan pada rentang tanggal tersebut.',
                'custom_type' => 'info'
            ]);
        }

        $pdf = PDF::loadView('admin.laporans.pdf', compact('workOrders'));
        $pdf->setPaper('a4', 'landscape');
        $fileName = 'laporan-list-' . date('Y-m-d') . '.pdf';
        return $pdf->download($fileName);
    }
}