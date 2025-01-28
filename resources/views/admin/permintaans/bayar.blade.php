@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Bayar Servis
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.update', [$permintaan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="motor">Mobil</label>
                <input disabled class="form-control {{ $errors->has('motor') ? 'is-invalid' : '' }}" type="text" name="motor" id="motor" value="{{ old('motor', $permintaan->motor) }}" required {{ auth()->user()->role != 'user' ? 'disabled' : '' }}>
                @if($errors->has('motor'))
                    <span class="text-danger">{{ $errors->first('motor') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="nomor_polisi">nomor_polisi</label>
                <input disabled class="form-control {{ $errors->has('nomor_polisi') ? 'is-invalid' : '' }}" type="text" name="nomor_polisi" id="nomor_polisi" value="{{ old('nomor_polisi', $permintaan->nomor_polisi) }}" required {{ auth()->user()->role != 'user' ? 'disabled' : '' }}>
                @if($errors->has('nomor_polisi'))
                    <span class="text-danger">{{ $errors->first('nomor_polisi') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="keluhan">Layanan</label>
                <textarea disabled class="form-control {{ $errors->has('keluhan') ? 'is-invalid' : '' }}" name="keluhan" id="keluhan" rows="3" {{ auth()->user()->role != 'user' ? 'disabled' : '' }}>{{ old('keluhan', $permintaan->keluhan) }}</textarea>
                @if($errors->has('keluhan'))
                    <span class="text-danger">{{ $errors->first('keluhan') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input disabled class="form-control {{ $errors->has('harga') ? 'is-invalid' : '' }}" type="number" name="harga" id="harga" value="{{ old('harga', $permintaan->harga) }}">
                @if($errors->has('harga'))
                    <span class="text-danger">{{ $errors->first('harga') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="bukti_pembayaran">Bukti Pembayaran</label>
                <input required class="form-control-file {{ $errors->has('bukti_pembayaran') ? 'is-invalid' : '' }}" type="file" name="bukti_pembayaran" id="bukti_pembayaran">
                @if($errors->has('bukti_pembayaran'))
                    <span class="text-danger">{{ $errors->first('bukti_pembayaran') }}</span>
                @endif
                @if($permintaan->bukti_pembayaran)
                    <div class="mt-2">
                        <a href="{{ $permintaan->bukti_pembayaran }}" target="_blank">Lihat bukti pembayaran</a>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tanggal_bayar">Tanggal Bayar</label>
                <input required class="form-control {{ $errors->has('tanggal_bayar') ? 'is-invalid' : '' }}" type="date" name="tanggal_bayar" id="tanggal_bayar" value="{{ old('tanggal_bayar', $permintaan->tanggal_bayar ? $permintaan->tanggal_bayar->format('Y-m-d') : '') }}">
                @if($errors->has('tanggal_bayar'))
                    <span class="text-danger">{{ $errors->first('tanggal_bayar') }}</span>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Bayar
                </button>
            </div>
        </form>
    </div>
</div>
</div>

@endsection
