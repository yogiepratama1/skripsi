@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Menu
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.variables.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nama">Nama</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama">
                @if($errors->has('nama'))
                <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="jenis">jenis</label>
                <input class="form-control {{ $errors->has('jenis') ? 'is-invalid' : '' }}" type="text" name="jenis" id="jenis">
                @if($errors->has('jenis'))
                <span class="text-danger">{{ $errors->first('jenis') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="harga_menu">Harga Menu</label>
                <input class="form-control {{ $errors->has('harga_menu') ? 'is-invalid' : '' }}" type="text" name="harga_menu" id="harga_menu">
                @if($errors->has('harga_menu'))
                <span class="text-danger">{{ $errors->first('harga_menu') }}</span>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

@endsection