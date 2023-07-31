@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Perancangan
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("dashboard.perancangans.store") }}" enctype="multipart/form-data">
            @csrf
            <input hidden name="permintaan_id" value="{{ $permintaan->id }}">
            <!-- Add below -->
            <div class="form-group">
                <label for="bahan_bangunan">Bahan Bangunan</label>
                <input class="form-control {{ $errors->has('bahan_bangunan') ? 'is-invalid' : '' }}" type="text" name="bahan_bangunan" id="bahan_bangunan" value="{{ old('bahan_bangunan') }}">
                @if($errors->has('bahan_bangunan'))
                    <span class="text-danger">{{ $errors->first('bahan_bangunan') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="sistem_konstruksi">Sistem Konstruksi</label>
                <input class="form-control {{ $errors->has('sistem_konstruksi') ? 'is-invalid' : '' }}" type="text" name="sistem_konstruksi" id="sistem_konstruksi" value="{{ old('sistem_konstruksi') }}">
                @if($errors->has('sistem_konstruksi'))
                    <span class="text-danger">{{ $errors->first('sistem_konstruksi') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="struktur_bangunan">Struktur Bangunan</label>
                <input class="form-control {{ $errors->has('struktur_bangunan') ? 'is-invalid' : '' }}" type="text" name="struktur_bangunan" id="struktur_bangunan" value="{{ old('struktur_bangunan') }}">
                @if($errors->has('struktur_bangunan'))
                    <span class="text-danger">{{ $errors->first('struktur_bangunan') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="gambar_bangunan">Gambar Bangunan</label>
                <input class="form-control {{ $errors->has('gambar_bangunan') ? 'is-invalid' : '' }}" type="file" name="gambar_bangunan" id="gambar_bangunan" value="{{ old('gambar_bangunan') }}">
                @if($errors->has('gambar_bangunan'))
                    <span class="text-danger">{{ $errors->first('gambar_bangunan') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="biaya">Biaya</label>
                <input class="form-control {{ $errors->has('biaya') ? 'is-invalid' : '' }}" type="number" name="biaya" id="biaya" value="{{ old('biaya') }}">
                @if($errors->has('biaya'))
                    <span class="text-danger">{{ $errors->first('biaya') }}</span>
                @endif
            </div>

            <!-- <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="setuju" name="setuju" {{ old('setuju') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="setuju">Setuju</label>
                </div>
                @if($errors->has('setuju'))
                    <span class="text-danger">{{ $errors->first('setuju') }}</span>
                @endif
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="mulai_konstruksi" name="mulai_konstruksi" {{ old('mulai_konstruksi') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="mulai_konstruksi">Mulai Konstruksi</label>
                </div>
                @if($errors->has('mulai_konstruksi'))
                    <span class="text-danger">{{ $errors->first('mulai_konstruksi') }}</span>
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
