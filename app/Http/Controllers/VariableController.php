<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\User;
use App\Models\Bobot;
use Illuminate\Http\Request;
use App\Models\NilaiVariable;
use Illuminate\Support\Facades\Auth;

class VariableController extends Controller
{
    public function index()
    {
        $variables = NilaiVariable::all();

        return view('admin.tests.index', compact('variables'));
    }

    public function create()
    {
        // $pelamars = User::where('role', 'user')->get();
        return view('admin.tests.create');
    }

    public function hitung()
    {
        $variables = NilaiVariable::all();
        $maxPorsi = $variables->max('porsi');
        $maxRasa = $variables->max('rasa');
        $minHarga = $variables->min('harga');

        $nilaiPorsiBobot = Bobot::where('nama', 'porsi')->first()->nilai;
        $nilaiRasaBobot = Bobot::where('nama', 'rasa')->first()->nilai;
        $nilaiHargaBobot = Bobot::where('nama', 'harga')->first()->nilai;

        foreach ($variables as $variable) {
            $preHasilPorsi = ($variable->porsi / $maxPorsi) * $nilaiPorsiBobot;
            $preHasilRasa = ($variable->rasa / $maxRasa) * $nilaiRasaBobot;
            $preHasilHarga = ($minHarga / $variable->harga) * $nilaiHargaBobot;
            $hasil = $preHasilPorsi + $preHasilRasa + $preHasilHarga;
            $variable->update([
                'hasil' => $hasil
            ]);
        }

        return redirect()->route('dashboard.variables.index');
    }

    public function store(Request $request)
    {
        NilaiVariable::create($request->all());
        return redirect()->route('dashboard.variables.index');
    }

    public function edit(NilaiVariable $variable)
    {
        return view('admin.tests.edit', compact('variable'));
    }

    public function update(Request $request, NilaiVariable $variable)
    {
        $variable->update($request->all());

        return redirect()->route('dashboard.variables.index');
    }

    public function show(NilaiVariable $variable)
    {
        $variable->load('user', 'barang');

        return view('admin.tests.show', compact('variable'));
    }

    public function destroy(NilaiVariable $variable)
    {
        $variable->delete();

        return back();
    }
}
