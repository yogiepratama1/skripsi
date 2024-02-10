@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Perencanaan Desain
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.perencanaans.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nama">Nama</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" required>
                @if($errors->has('nama'))
                <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" name="deskripsi" id="deskripsi">
                @if($errors->has('deskripsi'))
                <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="desain">Link Desain</label>
                <input type="text" class="form-control {{ $errors->has('desain') ? 'is-invalid' : '' }}" name="desain" id="desain">
                @if($errors->has('desain'))
                <span class="text-danger">{{ $errors->first('desain') }}</span>
                @endif
            </div>

            @if (auth()->user()->role == 'cofounder')
            <div class="form-group">
                <label class="required" for="status">Status</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value="setuju" {{ old('status') == 'setuju' ? 'selected' : '' }}>Setuju</option>
                    <option value="tidaksetuju" {{ old('status') == 'tidaksetuju' ? 'selected' : '' }}>Tidak Setuju</option>
                </select>
                @if($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
            </div>
            @endif

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

@endsection