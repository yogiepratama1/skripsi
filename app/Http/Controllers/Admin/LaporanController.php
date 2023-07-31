<?php

namespace App\Http\Controllers\Admin;

use \PDF;
use App\Models\FormulirPendaftaran;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index()
    {
        $formulirPendaftarans = FormulirPendaftaran::all();
        return view('admin.laporans.index', compact('formulirPendaftarans'));
    }

    public function create()
    {
        $formulirPendaftarans = FormulirPendaftaran::all();
    
        $pdf = PDF::loadView('admin.laporans.pdf', compact('formulirPendaftarans'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('laporan-list.pdf');
    }
}