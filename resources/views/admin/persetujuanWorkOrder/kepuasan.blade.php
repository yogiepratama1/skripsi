@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Nilai Kepuasan
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.kepuasan.update', [$permintaan->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="kepuasan">Kepuasan</label>
                <input max="100" class="form-control {{ $errors->has('kepuasan') ? 'is-invalid' : '' }}" type="number" name="kepuasan" id="kepuasan" value="{{ old('kepuasan') }}">
                @if($errors->has('kepuasan'))
                    <span class="text-danger">{{ $errors->first('kepuasan') }}</span>
                @endif
            </div>

            <!-- Add below -->
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
