<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::all();
        if (Auth::user()->role == 'user') {
            $tests = Test::where('user_id', Auth::user()->id)->get();
        }

        return view('admin.tests.index', compact('tests'));
    }

    public function create()
    {
        $pelamars = User::where('role', 'user')->get();
        return view('admin.tests.create', compact('pelamars'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->role == 'user') {
            $user_id = Auth::user()->id;
            $request->merge([
                'user_id' => $user_id
            ]);
        }

        Test::create($request->all());
        return redirect()->route('dashboard.tests.index');
    }

    public function edit(Test $test)
    {
        // $users = User::where('role', 'sales')->pluck('name', 'id')->prepend('Please Select', '');

        // $barangs = Asset::pluck('name', 'id')->prepend('Please Select', '');
        // $aksesoris = AssetCategory::pluck('name', 'id')->prepend('Please Select', '');
        $pelamars = User::where('role', 'user')->get();
        return view('admin.tests.edit', compact('test', 'pelamars'));
    }

    public function update(Request $request, Test $test)
    {
        $test->update($request->all());

        return redirect()->route('dashboard.tests.index');
    }

    public function show(Test $test)
    {
        $test->load('user', 'barang');

        return view('admin.tests.show', compact('test'));
    }

    public function destroy(Test $test)
    {
        $test->delete();

        return back();
    }
}
