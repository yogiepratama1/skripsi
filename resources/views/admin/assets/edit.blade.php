@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Pengembalian Barang
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("dashboard.assets.update", [$asset->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="barang_id">Barang</label>
                <select class="form-control select2 {{ $errors->has('barang_id') ? 'is-invalid' : '' }}" name="barang_id" id="barang_id" required>
                    @foreach ($barangs as $barang)
                    <option value="{{ $barang->id }}" {{ old('barang_id', $asset->barang_id) ==  $barang->id ? 'selected' : '' }}>{{ $barang->spesifikasi }}</option>
                    @endforeach
                </select>
                @if($errors->has('barang_id'))
                <span class="text-danger">{{ $errors->first('barang_id') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="alasan">Alasan</label>
                <input class="form-control {{ $errors->has('alasan') ? 'is-invalid' : '' }}" type="text" name="alasan" id="alasan" value="{{ old('alasan', $asset->alasan) }}" required>
                @if($errors->has('alasan'))
                <span class="text-danger">{{ $errors->first('alasan') }}</span>
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