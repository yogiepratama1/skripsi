@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.laporan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("dashboard.laporans.update", [$laporan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="permintaan_id">{{ trans('cruds.laporan.fields.permintaan') }}</label>
                <select class="form-control select2 {{ $errors->has('permintaan') ? 'is-invalid' : '' }}" name="permintaan_id" id="permintaan_id" required>
                    @foreach($permintaans as $id => $entry)
                        <option value="{{ $id }}" {{ (old('permintaan_id') ? old('permintaan_id') : $laporan->permintaan->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('permintaan'))
                    <span class="text-danger">{{ $errors->first('permintaan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.laporan.fields.permintaan_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>
