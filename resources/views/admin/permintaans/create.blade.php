@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Pendataan
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.store') }}" enctype="multipart/form-data">
            @csrf
            @if (auth()->user()->role != 'user')                
            <div class="form-group">
                <label for="user_id">Pilih Pelanggan</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $entry->id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
            </div>
            @endif

            <!-- Add below -->
            <div class="form-group">
                <label for="nama">Nama</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama') }}">
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" type="text" name="alamat" id="alamat" value="{{ old('alamat') }}">
                @if($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="no_hp">Nomor HP</label>
                <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}">
                @if($errors->has('no_hp'))
                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="barang">Barang</label>
                <input class="form-control {{ $errors->has('barang') ? 'is-invalid' : '' }}" type="text" name="barang" id="barang" value="{{ old('barang') }}">
                @if($errors->has('barang'))
                    <span class="text-danger">{{ $errors->first('barang') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}">
                @if($errors->has('jumlah'))
                    <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="total_harga">Total Harga</label>
                <input class="form-control {{ $errors->has('total_harga') ? 'is-invalid' : '' }}" type="number" name="total_harga" id="total_harga" value="{{ old('total_harga') }}">
                @if($errors->has('total_harga'))
                    <span class="text-danger">{{ $errors->first('total_harga') }}</span>
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
