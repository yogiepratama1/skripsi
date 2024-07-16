@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Penyidikan
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nama_penyidik">Nama penyidik</label>
                <input class="form-control {{ $errors->has('nama_penyidik') ? 'is-invalid' : '' }}" type="text" name="nama_penyidik" id="nama_penyidik" value="{{ old('nama_penyidik', '') }}" required>
                @if($errors->has('nama_penyidik'))
                    <span class="text-danger">{{ $errors->first('nama_penyidik') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="nama_tersangka">Nama Tersangka</label>
                <input class="form-control {{ $errors->has('nama_tersangka') ? 'is-invalid' : '' }}" type="text" name="nama_tersangka" id="nama_tersangka" value="{{ old('nama_tersangka', '') }}" required>
                @if($errors->has('nama_tersangka'))
                    <span class="text-danger">{{ $errors->first('nama_tersangka') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="saksi">Saksi</label>
                <input class="form-control {{ $errors->has('saksi') ? 'is-invalid' : '' }}" type="text" name="saksi" id="saksi" value="{{ old('saksi', '') }}" required>
                @if($errors->has('saksi'))
                    <span class="text-danger">{{ $errors->first('saksi') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="bukti">Bukti</label>
                <textarea class="form-control {{ $errors->has('bukti') ? 'is-invalid' : '' }}" name="bukti" id="bukti" rows="3" required>{{ old('bukti', '') }}</textarea>
                @if($errors->has('bukti'))
                    <span class="text-danger">{{ $errors->first('bukti') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="berkas">Link Berkas</label>
                <input class="form-control {{ $errors->has('berkas') ? 'is-invalid' : '' }}" type="text" name="berkas" id="berkas" value="{{ old('berkas', '') }}" required>
                @if($errors->has('berkas'))
                    <span class="text-danger">{{ $errors->first('berkas') }}</span>
                @endif
            </div>
            <!-- <div class="form-group">
                <label class="required" for="kelengkapan">Kelengkapan Berkas</label>
                <select class="form-control select2 {{ $errors->has('barang') ? 'is-invalid' : '' }}" name="kelengkapan" id="kelengkapan">
                    <option value="0" {{ old('kelengkapan') == 0 ? 'selected' : '' }}>Tidak Lengkap</option>
                    <option value="1" {{ old('kelengkapan') == 1 ? 'selected' : '' }}>Lengkap</option>
                </select>
                @if($errors->has('kelengkapan'))
                    <span class="text-danger">{{ $errors->first('kelengkapan') }}</span>
                @endif
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
