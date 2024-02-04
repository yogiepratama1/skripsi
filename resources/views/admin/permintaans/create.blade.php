@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Permintaan Lamaran
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nama">Nama Pelamar</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="alamat">Alamat</label>
                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat" rows="3" required></textarea>
                @if($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="jenis_kelamin">Jenis Kelamin</label>
                <input class="form-control {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}" name="jenis_kelamin" id="jenis_kelamin" required>
                @if($errors->has('jenis_kelamin'))
                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="cv">Link CV</label>
                <input class="form-control {{ $errors->has('cv') ? 'is-invalid' : '' }}" name="cv" id="cv" required>
                @if($errors->has('cv'))
                    <span class="text-danger">{{ $errors->first('cv') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="berkas">Link Berkas</label>
                <input class="form-control {{ $errors->has('berkas') ? 'is-invalid' : '' }}" name="berkas" id="berkas" required>
                @if($errors->has('berkas'))
                    <span class="text-danger">{{ $errors->first('berkas') }}</span>
                @endif
            </div>

            @if (auth()->user()->role != 'user')                
            <div class="form-group">
                <label class="required" for="user_id">Akun Pelamar</label>
                <select class="form-control select2 {{ $errors->has('user_id') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach ($pelamars as $pelamar)
                    <option value="{{ $pelamar->id }}" {{ old('user_id') == $pelamar->id ? 'selected' : '' }}>{{ $pelamar->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('user_id'))
                    <span class="text-danger">{{ $errors->first('user_id') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="status">Status</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value="terkirim" {{ old('status') == 'terkirim' ? 'selected' : '' }}>Terkirim</option>
                    <option value="test" {{ old('status') == 'test' ? 'selected' : '' }}>Test</option>
                    <option value="interview" {{ old('status') == 'interview' ? 'selected' : '' }}>Interview</option>
                    <option value="ttd" {{ old('status') == 'ttd' ? 'selected' : '' }}>Tanda Tangan Kontrak</option>
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="setuju_kontrak">Setuju Kontrak</label>
                <select class="form-control select2 {{ $errors->has('setuju_kontrak') ? 'is-invalid' : '' }}" name="setuju_kontrak" id="setuju_kontrak" required>
                    <option value="1" {{ old('setuju_kontrak') == 1 ? 'selected' : '' }}>Ya</option>
                    <option value="0" {{ old('setuju_kontrak') == 0 ? 'selected' : '' }}>Tidak</option>
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
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
