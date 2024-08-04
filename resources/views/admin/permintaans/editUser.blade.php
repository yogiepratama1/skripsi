@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Feedback
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.update.user', [$permintaanUser->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="feedback">feedback</label>
                <textarea class="form-control {{ $errors->has('feedback') ? 'is-invalid' : '' }}" name="feedback" id="feedback" rows="3" required>{{ old('feedback', $permintaanUser->feedback) }}</textarea>
                @if($errors->has('feedback'))
                    <span class="text-danger">{{ $errors->first('feedback') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="kehadiran">Kehadiran</label>
                <select name="kehadiran" id="kehadiran" class="form-control">
                    <option value="Tidak Hadir">Tidak Hadir</option>
                    <option value="Hadir">Hadir</option>
                </select>
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
