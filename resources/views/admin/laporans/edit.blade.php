@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Hasil Laporan
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("dashboard.laporans.update", [$laporan->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="hasillaporan">Hasil Laporan</label>
                <input value="{{ $laporan->hasillaporan }}" class="form-control {{ $errors->has('hasillaporan') ? 'is-invalid' : '' }}" type="text" name="hasillaporan" id="hasillaporan" required>
                @if($errors->has('hasillaporan'))
                <span class="text-danger">{{ $errors->first('hasillaporan') }}</span>
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