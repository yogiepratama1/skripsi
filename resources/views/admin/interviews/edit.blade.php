@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Interview
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.interviews.update', [$interview->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
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
                <label class="required" for="interviewer">Nama Interviewer</label>
                <input class="form-control {{ $errors->has('interviewer') ? 'is-invalid' : '' }}" type="text" name="interviewer" id="interviewer" required value="{{ $interview->interviewer }}">
                @if($errors->has('interviewer'))
                    <span class="text-danger">{{ $errors->first('interviewer') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="penampilan">Penampilan</label>
                <input type="number" value="{{ $interview->penampilan }}" class="form-control {{ $errors->has('penampilan') ? 'is-invalid' : '' }}" name="penampilan" id="penampilan">
                @if($errors->has('penampilan'))
                    <span class="text-danger">{{ $errors->first('penampilan') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="kesopanan">Kesopanan</label>
                <input type="number" value="{{ $interview->kesopanan }}" class="form-control {{ $errors->has('kesopanan') ? 'is-invalid' : '' }}" name="kesopanan" id="kesopanan">
                @if($errors->has('kesopanan'))
                    <span class="text-danger">{{ $errors->first('kesopanan') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="komunikasi">Komunikasi</label>
                <input type="number" value="{{ $interview->komunikasi }}" class="form-control {{ $errors->has('komunikasi') ? 'is-invalid' : '' }}" name="komunikasi" id="komunikasi">
                @if($errors->has('komunikasi'))
                    <span class="text-danger">{{ $errors->first('komunikasi') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="daya_tangkap">Daya Tangkap</label>
                <input type="number" value="{{ $interview->daya_tangkap }}" class="form-control {{ $errors->has('daya_tangkap') ? 'is-invalid' : '' }}" name="daya_tangkap" id="daya_tangkap">
                @if($errors->has('daya_tangkap'))
                    <span class="text-danger">{{ $errors->first('daya_tangkap') }}</span>
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
