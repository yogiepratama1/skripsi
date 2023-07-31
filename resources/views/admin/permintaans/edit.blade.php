@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Permintaan
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.update', [$permintaan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="user_id">User</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $permintaan->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                        <option value="{{ $id }}" {{ (old('barang_id') ? old('barang_id') : $permintaan->barang->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('barang'))
                    <span class="text-danger">{{ $errors->first('barang') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="nama_pelanggan">Nama Pelanggan</label>
                <input class="form-control {{ $errors->has('nama_pelanggan') ? 'is-invalid' : '' }}" type="text" name="nama_pelanggan" id="nama_pelanggan" value="{{ old('nama_pelanggan', $permintaan->nama_pelanggan) }}" required>
                @if($errors->has('nama_pelanggan'))
                    <span class="text-danger">{{ $errors->first('nama_pelanggan') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="alamat_pelanggan">Alamat Pelanggan</label>
                <textarea class="form-control {{ $errors->has('alamat_pelanggan') ? 'is-invalid' : '' }}" name="alamat_pelanggan" id="alamat_pelanggan" rows="3" required>{{ old('alamat_pelanggan', $permintaan->alamat_pelanggan) }}</textarea>
                @if($errors->has('alamat_pelanggan'))
                    <span class="text-danger">{{ $errors->first('alamat_pelanggan') }}</span>
                @endif
            </div>
            <!-- If auth role == gudang -->
            @if (auth()->user()->role == 'gudang')
            <div class="form-group">
                <label>Sudah Dikirim</label>
                @foreach(App\Models\Permintaan::SUDAH_DIKIRIM_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('sudah_dikirim') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="sudah_dikirim_{{ $key }}" name="sudah_dikirim" value="{{ $key }}" {{ old('sudah_dikirim', '0') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="sudah_dikirim_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('sudah_bayar'))
                    <span class="text-danger">{{ $errors->first('sudah_bayar') }}</span>
                @endif
            </div>
            @endif
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
