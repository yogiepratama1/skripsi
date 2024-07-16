@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Barang
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("dashboard.assets.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="id_permintaan">Nama Penyidik</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="id_permintaan" id="id_permintaan" required>
                    @foreach($permintaans as $id => $entry)
                        <option value="{{ $id }}" {{ old('id_permintaan') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="barang">Barang</label>
                <input class="form-control {{ $errors->has('barang') ? 'is-invalid' : '' }}" type="text" name="barang" id="barang" value="{{ old('barang', '') }}" required>
                @if($errors->has('barang'))
                    <span class="text-danger">{{ $errors->first('barang') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="jumlah">Jumlah</label>
                <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', '') }}" required>
                @if($errors->has('jumlah'))
                    <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                @endif
            </div>
            @if (auth()->user()->role != 'penyidik')
            <div class="form-group">
                <label class="required" for="status">Status</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Disetujui</option>
                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Diproses</option>
                    <option value="2" {{ old('status') == 1 ? 'selected' : '' }}>Siap Diambil</option>
                    <option value="3" {{ old('status') == 1 ? 'selected' : '' }}>Diterima</option>
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
