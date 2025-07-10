@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Tambah Work Order
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama Pelanggan</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name') }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="phone">Nomor HP Pelanggan</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone') }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="location">Lokasi</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location') }}">
                @if($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="installation_type">Tipe Instalasi</label>
                <select class="form-control {{ $errors->has('installation_type') ? 'is-invalid' : '' }}" name="installation_type" id="installation_type">
                    @foreach($installationTypes as $type)
                        <option value="{{ $type }}" {{ old('installation_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
                @if($errors->has('installation_type'))
                    <span class="text-danger">{{ $errors->first('installation_type') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="estimated_duration">Estimasi Durasi (Jam)</label>
                <input class="form-control {{ $errors->has('estimated_duration') ? 'is-invalid' : '' }}" type="number" name="estimated_duration" id="estimated_duration" value="{{ old('estimated_duration') }}">
                @if($errors->has('estimated_duration'))
                    <span class="text-danger">{{ $errors->first('estimated_duration') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" rows="3">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Buat
                </button>
            </div>
        </form>
    </div>
</div>

@endsection