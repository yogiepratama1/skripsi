@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Penerimaan Barang
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.update', [$permintaan->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="barang_id">Barang</label>
                <select class="form-control select2 {{ $errors->has('barang_id') ? 'is-invalid' : '' }}" name="barang_id" id="barang_id" required>
                    @foreach ($barangs as $barang)
                    <option value="{{ $barang->id }}" {{ old('barang_id', $permintaan->barang_id) ==  $barang->id ? 'selected' : '' }}>{{ $barang->spesifikasi }}</option>
                    @endforeach
                </select>
                @if($errors->has('barang_id'))
                <span class="text-danger">{{ $errors->first('barang_id') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="pemeriksaan_fisik">Pemeriksaan Fisik</label>
                <input value="{{ $permintaan->pemeriksaan_fisik }}" class="form-control {{ $errors->has('pemeriksaan_fisik') ? 'is-invalid' : '' }}" type="text" name="pemeriksaan_fisik" id="pemeriksaan_fisik" required>
                @if($errors->has('pemeriksaan_fisik'))
                <span class="text-danger">{{ $errors->first('pemeriksaan_fisik') }}</span>
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