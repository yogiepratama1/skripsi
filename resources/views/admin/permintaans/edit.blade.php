@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Permintaan Sponsorship
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.update', [$permintaan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @if (auth()->user()->role == 'user')
            <div class="form-group">
                <label class="required" for="nama_pelanggan">Nama Klien</label>
                <input class="form-control {{ $errors->has('nama_pelanggan') ? 'is-invalid' : '' }}" type="text" name="nama_pelanggan" id="nama_pelanggan" value="{{ $permintaan->nama_pelanggan }}" required>
                @if($errors->has('nama_pelanggan'))
                    <span class="text-danger">{{ $errors->first('nama_pelanggan') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="alamat_pelanggan">Nama Acara</label>
                <input class="form-control {{ $errors->has('alamat_pelanggan') ? 'is-invalid' : '' }}" type="text" name="alamat_pelanggan" id="alamat_pelanggan" value="{{ $permintaan->alamat_pelanggan }}" required>
                @if($errors->has('alamat_pelanggan'))
                    <span class="text-danger">{{ $errors->first('alamat_pelanggan') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="tanggal_bayar">Tanggal Acara</label>
                <input class="form-control {{ $errors->has('tanggal_bayar') ? 'is-invalid' : '' }}" type="date" name="tanggal_bayar" id="tanggal_bayar" value="{{ $permintaan->tanggal_bayar ? \Carbon\Carbon::parse($permintaan->tanggal_bayar)->format('Y-m-d') : '' }}">
                @if($errors->has('tanggal_bayar'))
                    <span class="text-danger">{{ $errors->first('tanggal_bayar') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="keluhan">Kebutuhan Sponsorship</label>
                <textarea class="form-control {{ $errors->has('keluhan') ? 'is-invalid' : '' }}" name="keluhan" id="keluhan" rows="3" required>{{ $permintaan->keluhan }}</textarea>
                @if($errors->has('keluhan'))
                    <span class="text-danger">{{ $errors->first('keluhan') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="motor">Anggaran</label>
                <input class="form-control {{ $errors->has('motor') ? 'is-invalid' : '' }}" type="number" name="motor" id="motor" value="{{ $permintaan->motor }}" required>
                @if($errors->has('motor'))
                    <span class="text-danger">{{ $errors->first('motor') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="nomor_polisi">Link Dokumen Proposal</label>
                <input class="form-control {{ $errors->has('nomor_polisi') ? 'is-invalid' : '' }}" type="text" name="nomor_polisi" id="nomor_polisi" value="{{ $permintaan->nomor_polisi }}" required placeholder="Contoh: https://drive.google.com/...">
                @if($errors->has('nomor_polisi'))
                    <span class="text-danger">{{ $errors->first('nomor_polisi') }}</span>
                @endif
            </div>
            @endif
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
            @if (auth()->user()->role == 'proposal')                
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value="0" {{ old('status', $permintaan->status) == '0' ? 'selected' : '' }}>Not Verified</option>
                    <option value="1" {{ old('status', $permintaan->status) == '1' ? 'selected' : '' }}>Verified</option>
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
            </div>
            @endif
            @if (auth()->user()->role == 'monitoring')                
            <div class="form-group">
                <label for="status_acara">Status Acara</label>
                <select class="form-control {{ $errors->has('status_acara') ? 'is-invalid' : '' }}" name="status_acara" id="status_acara">
                    <option value="0" {{ old('status_acara', $permintaan->status_acara) == '0' ? 'selected' : '' }}>Not Started</option>
                    <option value="1" {{ old('status_acara', $permintaan->status_acara) == '1' ? 'selected' : '' }}>Ongoing</option>
                    <option value="2" {{ old('status_acara', $permintaan->status_acara) == '2' ? 'selected' : '' }}>Completed</option>
                </select>
                @if($errors->has('status_acara'))
                    <span class="text-danger">{{ $errors->first('status_acara') }}</span>
                @endif
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
