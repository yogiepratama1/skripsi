@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Pembayaran
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.pembayarans.update', [$pembayaran->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="permintaan_id">Nama Pelanggan Permintaan</label>
                <select class="form-control select2 {{ $errors->has('permintaan') ? 'is-invalid' : '' }}" name="permintaan_id" id="permintaan_id" required>
                    @foreach($permintaans as $id => $entry)
                        <option value="{{ $id }}" {{ (old('permintaan_id') ? old('permintaan_id') : $pembayaran->permintaan->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('permintaan'))
                    <span class="text-danger">{{ $errors->first('permintaan') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="tanggal_bayar">Tanggal Bayar</label>
                <input class="form-control datetime {{ $errors->has('tanggal_bayar') ? 'is-invalid' : '' }}" type="text" name="tanggal_bayar" id="tanggal_bayar" value="{{ old('tanggal_bayar', $pembayaran->tanggal_bayar) }}">
                @if($errors->has('tanggal_bayar'))
                    <span class="text-danger">{{ $errors->first('tanggal_bayar') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="harga_dibayar">Harga Dibayar</label>
                <input class="form-control {{ $errors->has('harga_dibayar') ? 'is-invalid' : '' }}" type="number" name="harga_dibayar" id="harga_dibayar" value="{{ old('harga_dibayar', $pembayaran->harga_dibayar) }}" step="0.01">
                @if($errors->has('harga_dibayar'))
                    <span class="text-danger">{{ $errors->first('harga_dibayar') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label>Sudah Bayar</label>
                @foreach(App\Models\Pembayaran::SUDAH_BAYAR_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('sudah_bayar') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="sudah_bayar_{{ $key }}" name="sudah_bayar" value="{{ $key }}" {{ old('sudah_bayar', $pembayaran->sudah_bayar) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="sudah_bayar_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('sudah_bayar'))
                    <span class="text-danger">{{ $errors->first('sudah_bayar') }}</span>
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
