@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Permintaan
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user_id">Pilih Sales</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="barang_id">Barang</label>
                <select class="form-control select2 {{ $errors->has('barang') ? 'is-invalid' : '' }}" name="barang_id" id="barang_id" required>
                    @foreach($barangs as $id => $entry)
                        <option value="{{ $id }}" {{ old('barang_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('barang'))
                    <span class="text-danger">{{ $errors->first('barang') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="nama_pelanggan">Nama Pelanggan</label>
                <input class="form-control {{ $errors->has('nama_pelanggan') ? 'is-invalid' : '' }}" type="text" name="nama_pelanggan" id="nama_pelanggan" value="{{ old('nama_pelanggan', '') }}" required>
                @if($errors->has('nama_pelanggan'))
                    <span class="text-danger">{{ $errors->first('nama_pelanggan') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="alamat_pelanggan">Alamat Pelanggan</label>
                <textarea class="form-control {{ $errors->has('alamat_pelanggan') ? 'is-invalid' : '' }}" name="alamat_pelanggan" id="alamat_pelanggan" rows="3" required>{{ old('alamat_pelanggan', '') }}</textarea>
                @if($errors->has('alamat_pelanggan'))
                    <span class="text-danger">{{ $errors->first('alamat_pelanggan') }}</span>
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
