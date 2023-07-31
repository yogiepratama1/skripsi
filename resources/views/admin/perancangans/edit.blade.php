@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Promo
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("dashboard.perancangans.update", $perancangan->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input hidden name="permintaan_id" value="{{ $perancangan->permintaan_id }}">
            <!-- Add below -->
            <div class="form-group">
                <label for="promo">Promo</label>
                <input class="form-control {{ $errors->has('promo') ? 'is-invalid' : '' }}" type="text" name="promo" id="promo" value="{{ $perancangan->promo }}">
                @if($errors->has('promo'))
                    <span class="text-danger">{{ $errors->first('promo') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="tanggal_promo">Tanggal Promo</label>
                <input class="form-control date {{ $errors->has('tanggal_promo') ? 'is-invalid' : '' }}" type="text" name="tanggal_promo" id="tanggal_promo" value="{{ $perancangan->tanggal_promo ? \Carbon\Carbon::parse($perancangan->tanggal_promo)->format('d-m-Y') : '' }}">
                @if($errors->has('tanggal_promo'))
                    <span class="text-danger">{{ $errors->first('tanggal_promo') }}</span>
                @endif
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
