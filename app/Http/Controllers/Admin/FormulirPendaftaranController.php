<?php

namespace App\Http\Controllers\Admin;

use App\Models\AssetStatus;
use Illuminate\Http\Request;
use App\Models\AssetCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssetRequest;
use App\Models\FormulirPendaftaran;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use \PDF;

class FormulirPendaftaranController extends Controller
{
    public function index()
    {
        $formulirPendaftarans = FormulirPendaftaran::all();
        $count = 0;
        if(Auth::user()->role == 'user') {
            $formulirPendaftarans = FormulirPendaftaran::where('user_id', Auth::user()->id)->first();
            $count = FormulirPendaftaran::where('user_id', Auth::user()->id)->count();
        }

        return view('admin.assets.index', compact('formulirPendaftarans', 'count'));
    }

    public function create()
    {
        $users = User::where('role', 'user')->get();
        $jenis_kelamins = [
            ['id' => 1, 'name' => 'Laki-laki'],
            ['id' => 2, 'name' => 'Perempuan'],
        ];
        return view('admin.assets.create', compact('users', 'jenis_kelamins'));
    }

    public function store(Request $request)
    {
        $formulirPendaftaran = FormulirPendaftaran::create($request->all());

        return redirect()->route('dashboard.formulirPendaftarans.index');
    }

    public function edit(FormulirPendaftaran $formulirPendaftaran)
    {
        $users = User::where('role', 'user')->get();
        $jenis_kelamins = [
            ['id' => 1, 'name' => 'Laki-laki'],
            ['id' => 2, 'name' => 'Perempuan'],
        ];
        return view('admin.assets.edit', compact('formulirPendaftaran'));
    }

    public function proses(FormulirPendaftaran $formulirPendaftaran)
    {
        $formulirPendaftaran->update(['status' => 2]);
        return redirect()->route('dashboard.formulirPendaftarans.index');
    }
    
    public function setujui(FormulirPendaftaran $formulirPendaftaran)
    {
        $formulirPendaftaran->update(['status' => 3]);
        return redirect()->route('dashboard.formulirPendaftarans.index');
    }

    public function cetakKartu(FormulirPendaftaran $formulirPendaftaran)
    {
        $pdf = PDf::loadView('admin.assets.cetakKartu', compact('formulirPendaftaran'));
        return $pdf->download('kartu.pdf');
    }

    public function update(Request $request, FormulirPendaftaran $formulirPendaftaran)
    {
        $formulirPendaftaran->update($request->all());

        return redirect()->route('dashboard.formulirPendaftarans.index');
    }

    // public function show(FormulirPendaftaran $formulirPendaftaran)
    // {
    //     return view('admin.assets.show', compact('formulirPendaftaran'));
    // }

    public function destroy(FormulirPendaftaran $formulirPendaftaran)
    {
        $formulirPendaftaran->delete();

        return redirect()->route('dashboard.formulirPendaftarans.index');
    }

    // public function massDestroy(MassDestroyAssetRequest $request)
    // {
    //     $formulirPendaftarans = FormulirPendaftaran::find(request('ids'));

    //     foreach ($formulirPendaftarans as $formulirPendaftaran) {
    //         $formulirPendaftaran->delete();
    //     }

    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}
