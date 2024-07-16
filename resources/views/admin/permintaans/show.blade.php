@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Detail Penyidikan
    </div>

    <div class="card-body">
        <div class="form-group">
            <label for="nama_penyidik">Nama Penyidik:</label>
            <input class="form-control" type="text" id="nama_penyidik" value="{{ $permintaan->nama_penyidik }}" disabled>
        </div>
        <div class="form-group">
            <label for="nama_tersangka">Nama Tersangka:</label>
            <input class="form-control" type="text" id="nama_tersangka" value="{{ $permintaan->nama_tersangka }}" disabled>
        </div>
        <div class="form-group">
            <label for="saksi">Saksi:</label>
            <input class="form-control" type="text" id="saksi" value="{{ $permintaan->saksi }}" disabled>
        </div>
        <div class="form-group">
            <label for="bukti">Bukti:</label>
            <textarea class="form-control" id="bukti" rows="3" disabled>{{ $permintaan->bukti }}</textarea>
        </div>
        <div class="form-group">
            <label for="berkas">Link Berkas:</label>
            <input class="form-control" type="text" id="berkas" value="{{ $permintaan->berkas }}" disabled>
        </div>
        <div class="form-group">
            <label for="kelengkapan">Kelengkapan Berkas:</label>
            <input class="form-control" type="text" id="kelengkapan" value="{{ $permintaan->kelengkapan ? 'Lengkap' : 'Tidak Lengkap' }}" disabled>
        </div>
        <div class="form-group">
            <label for="created_at">Tanggal Dibuat:</label>
            <input class="form-control" type="text" id="created_at" value="{{ $permintaan->created_at->format('Y-m-d') }}" disabled>
        </div>
        <div class="form-group">
            <a class="btn btn-secondary" href="{{ route('dashboard.permintaans.index') }}">Back</a>
        </div>
    </div>
</div>

@endsection
