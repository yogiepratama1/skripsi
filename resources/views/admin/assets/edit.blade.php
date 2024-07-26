@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Barang
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("dashboard.assets.update", [$asset->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $asset->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" name="deskripsi" id="deskripsi">{{ old('deskripsi', $asset->deskripsi) }}</textarea>
                @if($errors->has('deskripsi'))
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
            </div>
<!-- 
            <div class="form-group">
                <label class="required" for="name">Merek</label>
                <input class="form-control {{ $errors->has('merek') ? 'is-invalid' : '' }}" type="text" merek="merek" id="merek" value="{{ old('merek', $asset->merek) }}" required>
                @if($errors->has('merek'))
                    <span class="text-danger">{{ $errors->first('merek') }}</span>
                @endif
            </div> -->
            <div class="form-group">
                <label class="required" for="harga">Harga</label>
                <input class="form-control {{ $errors->has('harga') ? 'is-invalid' : '' }}" type="number" name="harga" id="harga" value="{{ old('harga', $asset->harga) }}" step="0.01" required>
                @if($errors->has('harga'))
                    <span class="text-danger">{{ $errors->first('harga') }}</span>
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
