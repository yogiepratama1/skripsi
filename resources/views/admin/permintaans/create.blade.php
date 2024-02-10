@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Permintaan Reservasi
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.permintaans.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="id_desain">Desain</label>
                <select class="form-control select2 {{ $errors->has('id_desain') ? 'is-invalid' : '' }}" name="id_desain" id="id_desain" required>
                    @foreach ($desains as $desain)
                    <option value="{{ $desain->id }}" {{ old('id_desain') ==  $desain->id ? 'selected' : '' }}>{{ $desain->nama }}</option>
                    @endforeach
                </select>
                @if($errors->has('pelanggan'))
                <span class="text-danger">{{ $errors->first('pelanggan') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="nama">Nama</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" required>
                @if($errors->has('nama'))
                <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="harga">Harga per pc</label>
                <input class="form-control {{ $errors->has('harga') ? 'is-invalid' : '' }}" type="number" name="harga" id="harga" required>
                @if($errors->has('harga'))
                <span class="text-danger">{{ $errors->first('harga') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="jumlah">Jumlah</label>
                <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number" name="jumlah" id="jumlah" required>
                @if($errors->has('jumlah'))
                <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="status">Status</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value="belum_diproduksi" {{ old('status') == 'belum_diproduksi' ? 'selected' : '' }}>Belum Diproduksi</option>
                    <option value="diproduksi" {{ old('status') == 'diproduksi' ? 'selected' : '' }}>Diproduksi</option>
                    <option value="produksi_selesai" {{ old('status') == 'produksi_selesai' ? 'selected' : '' }}>Produksi Selesai</option>
                </select>
                @if($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
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