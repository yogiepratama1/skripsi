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
                <label class="required" for="motor">Motor</label>
                <input class="form-control {{ $errors->has('motor') ? 'is-invalid' : '' }}" type="text" name="motor" id="motor" value="{{ old('motor', '') }}" required>
                @if($errors->has('motor'))
                    <span class="text-danger">{{ $errors->first('motor') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="nomor_polisi">nomor_polisi</label>
                <input class="form-control {{ $errors->has('nomor_polisi') ? 'is-invalid' : '' }}" type="text" name="nomor_polisi" id="nomor_polisi" value="{{ old('nomor_polisi', '') }}" required>
                @if($errors->has('nomor_polisi'))
                    <span class="text-danger">{{ $errors->first('nomor_polisi') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="keluhan">Keluhan</label>
                <textarea class="form-control {{ $errors->has('keluhan') ? 'is-invalid' : '' }}" name="keluhan" id="keluhan" rows="3">{{ old('keluhan', '') }}</textarea>
                @if($errors->has('keluhan'))
                    <span class="text-danger">{{ $errors->first('keluhan') }}</span>
                @endif
            </div>
            <!-- <div class="form-group">
                <label for="bukti_pembayaran">Bukti Pembayaran</label>
                <input class="form-control-file {{ $errors->has('bukti_pembayaran') ? 'is-invalid' : '' }}" type="file" name="bukti_pembayaran" id="bukti_pembayaran">
                @if($errors->has('bukti_pembayaran'))
                    <span class="text-danger">{{ $errors->first('bukti_pembayaran') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input class="form-control {{ $errors->has('harga') ? 'is-invalid' : '' }}" type="number" name="harga" id="harga" value="{{ old('harga', '') }}">
                @if($errors->has('harga'))
                    <span class="text-danger">{{ $errors->first('harga') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Diproses</option>
                    <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Menunggu Pembayaran</option>
                    <option value="3" {{ old('status') == '3' ? 'selected' : '' }}>Selesai</option>
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="tanggal_bayar">Tanggal Bayar</label>
                <input class="form-control {{ $errors->has('tanggal_bayar') ? 'is-invalid' : '' }}" type="date" name="tanggal_bayar" id="tanggal_bayar" value="{{ old('tanggal_bayar', '') }}">
                @if($errors->has('tanggal_bayar'))
                    <span class="text-danger">{{ $errors->first('tanggal_bayar') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="spareparts">Sparepart yang Dipakai</label>
                <select name="spareparts[]" id="spareparts" class="form-control select2" multiple>
                    @foreach($assets as $asset)
                        <option value="{{ $asset->name }}">{{ $asset->name }}</option>
                    @endforeach
                </select>
            </div> -->

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
