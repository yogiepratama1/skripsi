@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Test
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.tests.store') }}" enctype="multipart/form-data">
            @csrf
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
            @endif
            <div class="form-group">
                <label class="required" for="hasil">Hasil Test</label>
                <input class="form-control {{ $errors->has('hasil') ? 'is-invalid' : '' }}" type="number" name="hasil" id="hasil" placeholder="tidak perlu diisi jika pelamar belum selesai test">
                @if($errors->has('hasil'))
                    <span class="text-danger">{{ $errors->first('hasil') }}</span>
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
