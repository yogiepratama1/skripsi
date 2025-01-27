@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Servis
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.update', [$permintaan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nama_pelanggan">Nama Pelanggan</label>
                <input class="form-control {{ $errors->has('nama_pelanggan') ? 'is-invalid' : '' }}" type="text" name="nama_pelanggan" id="nama_pelanggan" value="{{ old('nama_pelanggan', $permintaan->nama_pelanggan) }}" required {{ auth()->user()->role != 'user' ? 'disabled' : '' }}>
                @if($errors->has('nama_pelanggan'))
                    <span class="text-danger">{{ $errors->first('nama_pelanggan') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="alamat_pelanggan">Alamat Pelanggan</label>
                <textarea class="form-control {{ $errors->has('alamat_pelanggan') ? 'is-invalid' : '' }}" name="alamat_pelanggan" id="alamat_pelanggan" rows="3" required {{ auth()->user()->role != 'user' ? 'disabled' : '' }}>{{ old('alamat_pelanggan', $permintaan->alamat_pelanggan) }}</textarea>
                @if($errors->has('alamat_pelanggan'))
                    <span class="text-danger">{{ $errors->first('alamat_pelanggan') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="motor">Mobil</label>
                <input class="form-control {{ $errors->has('motor') ? 'is-invalid' : '' }}" type="text" name="motor" id="motor" value="{{ old('motor', $permintaan->motor) }}" required {{ auth()->user()->role != 'user' ? 'disabled' : '' }}>
                @if($errors->has('motor'))
                    <span class="text-danger">{{ $errors->first('motor') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="nomor_polisi">nomor_polisi</label>
                <input class="form-control {{ $errors->has('nomor_polisi') ? 'is-invalid' : '' }}" type="text" name="nomor_polisi" id="nomor_polisi" value="{{ old('nomor_polisi', $permintaan->nomor_polisi) }}" required {{ auth()->user()->role != 'user' ? 'disabled' : '' }}>
                @if($errors->has('nomor_polisi'))
                    <span class="text-danger">{{ $errors->first('nomor_polisi') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="keluhan">Keluhan</label>
                <textarea class="form-control {{ $errors->has('keluhan') ? 'is-invalid' : '' }}" name="keluhan" id="keluhan" rows="3" {{ auth()->user()->role != 'user' ? 'disabled' : '' }}>{{ old('keluhan', $permintaan->keluhan) }}</textarea>
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
                @if($permintaan->bukti_pembayaran)
                    <div class="mt-2">
                <p>Current File: [file name or preview]</p>
                    </div>
                @endif
            </div> -->
            @if (auth()->user()->role == 'kasir')
            <div class="form-group">
                <label for="harga">Harga</label>
                <input class="form-control {{ $errors->has('harga') ? 'is-invalid' : '' }}" type="number" name="harga" id="harga" value="{{ old('harga', $permintaan->harga) }}">
                @if($errors->has('harga'))
                    <span class="text-danger">{{ $errors->first('harga') }}</span>
                @endif
            </div>
            @endif
            @if (auth()->user()->role != 'user')                
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value="0" {{ old('status', $permintaan->status) == '0' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                    <option value="1" {{ old('status', $permintaan->status) == '1' ? 'selected' : '' }}>Diproses</option>
                    <option value="2" {{ old('status', $permintaan->status) == '2' ? 'selected' : '' }}>Menunggu Pembayaran</option>
                    @if (auth()->user()->role =='kasir')
                    <option value="3" {{ old('status', $permintaan->status) == '3' ? 'selected' : '' }}>Selesai</option>
                    @endif
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
            </div>

            <div class="form-group">
                @php
                $sparepartsArray = explode(',', $permintaan->spareparts);
                @endphp

                <label for="spareparts">Sparepart yang Dipakai</label>
                <select name="spareparts[]" id="spareparts" class="form-control select2" multiple>
                    @foreach($assets as $asset)
                        <option value="{{ $asset->name }}" 
                            @if(in_array($asset->name, $sparepartsArray)) selected @endif>
                            {{ $asset->name }}
                        </option>
                    @endforeach
                </select>
                </div>
@endif
            <!-- <div class="form-group">
                <label for="tanggal_bayar">Tanggal Bayar</label>
                <input class="form-control {{ $errors->has('tanggal_bayar') ? 'is-invalid' : '' }}" type="date" name="tanggal_bayar" id="tanggal_bayar" value="{{ old('tanggal_bayar', $permintaan->tanggal_bayar ? $permintaan->tanggal_bayar->format('Y-m-d') : '') }}">
                @if($errors->has('tanggal_bayar'))
                    <span class="text-danger">{{ $errors->first('tanggal_bayar') }}</span>
                @endif
            </div> -->
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
</div>

@endsection
