<?php

namespace App\Http\Controllers\Admin;

use \PDF;
use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use App\Models\Permintaan;

class LaporanController extends Controller
{
    public function index()
    {
        $permintaans = Permintaan::all();
        if (auth()->user()->role == 'user') {
            $permintaans = Permintaan::where('user_id', auth()->user()->id)->get();
        }
        return view('admin.laporans.index', compact('permintaans'));
    }

    public function create()
    {
        $permintaans = Permintaan::all();
    
        $pdf = PDF::loadView('admin.laporans.pdf', compact('permintaans'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('laporan-list.pdf');
    }
}