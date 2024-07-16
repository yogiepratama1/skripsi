@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Detail Barang
    </div>

    <div class="card-body">
        <div class="form-group">
            <label for="id_permintaan">Nama Penyidik:</label>
            <input class="form-control" type="text" id="id_permintaan" value="{{ $asset->permintaan->nama_penyidik }}" disabled>
        </div>
        <div class="form-group">
            <label for="barang">Barang:</label>
            <input class="form-control" type="text" id="barang" value="{{ $asset->barang }}" disabled>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input class="form-control" type="number" id="jumlah" value="{{ $asset->jumlah }}" disabled>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input class="form-control" type="text" id="status" value="{{ $asset->status_text }}" disabled>
        </div>
        <div class="form-group">
            <a class="btn btn-secondary" href="{{ route('dashboard.assets.index') }}">Back</a>
        </div>
    </div>
</div>

@endsection
