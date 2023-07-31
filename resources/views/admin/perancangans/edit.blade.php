@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Perancangan
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("dashboard.perancangans.update", [$perancangan->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Add below -->
            @if (auth()->user()->role == 'user')                
            <div class="form-group">
                <label for="setuju">Setujui</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="setuju" id="setuju1" value="1" {{ old('setuju', $perancangan->setuju) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="setuju1">Ya</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="setuju" id="setuju0" value="0" {{ old('setuju', $perancangan->setuju) == 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="setuju0">Tidak</label>
                </div>
                @if($errors->has('setuju'))
                    <span class="text-danger">{{ $errors->first('setuju') }}</span>
                @endif
            </div>
            @elseif (auth()->user()->role == 'sipil')                
            <div class="form-group">
                <label for="mulai_konstruksi">Mulai Konstruksi</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="mulai_konstruksi" id="mulai_konstruksi1" value="1" {{ old('mulai_konstruksi', $perancangan->mulai_konstruksi) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="mulai_konstruksi1">Ya</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="mulai_konstruksi" id="mulai_konstruksi0" value="0" {{ old('mulai_konstruksi', $perancangan->mulai_konstruksi) == 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="mulai_konstruksi0">Tidak</label>
                </div>
                @if($errors->has('mulai_konstruksi'))
                    <span class="text-danger">{{ $errors->first('mulai_konstruksi') }}</span>
                @endif
            </div>
            @else
            <div class="form-group">
                <label for="bahan_bangunan">Bahan Bangunan</label>
                <input class="form-control {{ $errors->has('bahan_bangunan') ? 'is-invalid' : '' }}" type="text" name="bahan_bangunan" id="bahan_bangunan" value="{{ old('bahan_bangunan', $perancangan->bahan_bangunan) }}">
                @if($errors->has('bahan_bangunan'))
                    <span class="text-danger">{{ $errors->first('bahan_bangunan') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="sistem_konstruksi">Sistem Konstruksi</label>
                <input class="form-control {{ $errors->has('sistem_konstruksi') ? 'is-invalid' : '' }}" type="text" name="sistem_konstruksi" id="sistem_konstruksi" value="{{ old('sistem_konstruksi', $perancangan->sistem_konstruksi) }}">
                @if($errors->has('sistem_konstruksi'))
                    <span class="text-danger">{{ $errors->first('sistem_konstruksi') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="struktur_bangunan">Struktur Bangunan</label>
                <input class="form-control {{ $errors->has('struktur_bangunan') ? 'is-invalid' : '' }}" type="text" name="struktur_bangunan" id="struktur_bangunan" value="{{ old('struktur_bangunan', $perancangan->struktur_bangunan) }}">
                @if($errors->has('struktur_bangunan'))
                    <span class="text-danger">{{ $errors->first('struktur_bangunan') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="gambar_bangunan">Gambar Bangunan</label>
                <input class="form-control {{ $errors->has('gambar_bangunan') ? 'is-invalid' : '' }}" type="file" name="gambar_bangunan" id="gambar_bangunan">
                @if($errors->has('gambar_bangunan'))
                    <span class="text-danger">{{ $errors->first('gambar_bangunan') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="biaya">Biaya</label>
                <input class="form-control {{ $errors->has('biaya') ? 'is-invalid' : '' }}" type="number" name="biaya" id="biaya" value="{{ old('biaya', $perancangan->biaya) }}">
                @if($errors->has('biaya'))
                    <span class="text-danger">{{ $errors->first('biaya') }}</span>
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
