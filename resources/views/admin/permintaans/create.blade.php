@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Pelatihan
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="judul">Judul</label>
                <input class="form-control {{ $errors->has('judul') ? 'is-invalid' : '' }}" type="text" name="judul" id="judul" value="{{ old('judul', '') }}" required>
                @if($errors->has('judul'))
                    <span class="text-danger">{{ $errors->first('judul') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="deskripsi">Deskripsi</label>
                <textarea class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" name="deskripsi" id="deskripsi" rows="3" required>{{ old('deskripsi', '') }}</textarea>
                @if($errors->has('deskripsi'))
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="tanggal_pelatihan">Tanggal Pelatihan</label>
                <input class="form-control {{ $errors->has('tanggal_pelatihan') ? 'is-invalid' : '' }}" type="datetime-local" name="tanggal_pelatihan" id="tanggal_pelatihan" required>
                @if($errors->has('tanggal_pelatihan'))
                    <span class="text-danger">{{ $errors->first('tanggal_pelatihan') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="peserta">Peserta</label>
                <select name="peserta[]" id="peserta" class="form-control select2" multiple>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
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
