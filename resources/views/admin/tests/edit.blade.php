@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Nilai Variable
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.variables.update', [$variable->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @if (auth()->user()->role == 'user')
            <label class="required" for="porsi">Porsi</label>
            <select class="form-control select2 {{ $errors->has('porsi') ? 'is-invalid' : '' }}" name="porsi" id="porsi" required>
                <option value="1" {{ old('porsi') == 1 ? 'selected' : '' }}>Kecil</option>
                <option value="2" {{ old('porsi') == 2 ? 'selected' : '' }}>Sedang</option>
                <option value="3" {{ old('porsi') == 3 ? 'selected' : '' }}>Besar</option>
                <option value="4" {{ old('porsi') == 4 ? 'selected' : '' }}>Sangat Besar</option>
            </select>
            @if($errors->has('porsi'))
            <span class="text-danger">{{ $errors->first('porsi') }}</span>
            @endif

            <label class="required" for="rasa">rasa</label>
            <select class="form-control select2 {{ $errors->has('rasa') ? 'is-invalid' : '' }}" name="rasa" id="rasa" required>
                <option value="1" {{ old('rasa') == 1 ? 'selected' : '' }}>Tidak Enak</option>
                <option value="2" {{ old('rasa') == 2 ? 'selected' : '' }}>Kurang Enak</option>
                <option value="3" {{ old('rasa') == 3 ? 'selected' : '' }}>Enak</option>
                <option value="4" {{ old('rasa') == 4 ? 'selected' : '' }}>Sangat Enak</option>
            </select>
            @if($errors->has('rasa'))
            <span class="text-danger">{{ $errors->first('rasa') }}</span>
            @endif

            <label class="required" for="harga">harga</label>
            <select class="form-control select2 {{ $errors->has('harga') ? 'is-invalid' : '' }}" name="harga" id="harga" required>
                <option value="1" {{ old('harga') == 1 ? 'selected' : '' }}>Sangat Murah</option>
                <option value="2" {{ old('harga') == 2 ? 'selected' : '' }}>Murah</option>
                <option value="3" {{ old('harga') == 3 ? 'selected' : '' }}>Mahal</option>
                <option value="4" {{ old('harga') == 4 ? 'selected' : '' }}>Sangat Mahal</option>
            </select>
            @if($errors->has('harga'))
            <span class="text-danger">{{ $errors->first('harga') }}</span>
            @endif

            @endif

            @if (auth()->user()->role == 'barista')
            <div class="form-group">
                <label class="required" for="nama">Nama</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $variable->nama) }}" required>
                @if($errors->has('nama'))
                <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="jenis">Jenis</label>
                <input class="form-control {{ $errors->has('jenis') ? 'is-invalid' : '' }}" type="text" name="jenis" id="jenis" value="{{ old('jenis', $variable->jenis) }}" required>
                @if($errors->has('jenis'))
                <span class="text-danger">{{ $errors->first('jenis') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="harga_menu">Harga Menu</label>
                <input class="form-control {{ $errors->has('harga_menu') ? 'is-invalid' : '' }}" type="text" name="harga_menu" id="harga_menu" value="{{ old('harga_menu', $variable->harga_menu) }}" required>
                @if($errors->has('harga_menu'))
                <span class="text-danger">{{ $errors->first('harga_menu') }}</span>
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