@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Detail Penyidikan
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("dashboard.penyidikan.update", [$assetCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Nama Penyidik</label>
                <input disabled class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $assetCategory->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="harga">Nama Tersangka</label>
                <input disabled class="form-control {{ $errors->has('harga') ? 'is-invalid' : '' }}" type="number" name="harga" id="harga" value="{{ old('harga', $assetCategory->harga) }}" required>
                @if($errors->has('harga'))
                    <span class="text-danger">{{ $errors->first('harga') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Saksi-saksi</label>
                <input disabled class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $assetCategory->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Bukti</label>
                <input disabled class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $assetCategory->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                 <a class="btn btn-xs btn-info" href="{{ route('dashboard.penyidikan.index') }}">
                    Back
                 </a>
            </div>
        </form>
    </div>
</div>



@endsection