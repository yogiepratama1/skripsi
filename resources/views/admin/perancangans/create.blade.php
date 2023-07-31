@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Promo
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("dashboard.perancangans.store") }}" enctype="multipart/form-data">
            @csrf
            <input hidden name="permintaan_id" value="{{ $permintaan->id }}">
            <!-- Add below -->
            <div class="form-group">
                <label for="promo">Promo</label>
                <input class="form-control {{ $errors->has('promo') ? 'is-invalid' : '' }}" type="text" name="promo" id="promo" value="{{ old('promo') }}">
                @if($errors->has('promo'))
                    <span class="text-danger">{{ $errors->first('promo') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="tanggal_promo">Tanggal Promo</label>
                <input class="form-control date {{ $errors->has('tanggal_promo') ? 'is-invalid' : '' }}" type="text" name="tanggal_promo" id="tanggal_promo" value="{{ old('tanggal_promo') }}">
                @if($errors->has('tanggal_promo'))
                    <span class="text-danger">{{ $errors->first('tanggal_promo') }}</span>
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
