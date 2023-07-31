@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Permintaan
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("dashboard.formulirPendaftarans.update", $formulirPendaftaran->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if (auth()->user()->role == 'user')
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            @else
            <div class="form-group">
                <label class="required" for="user_id">Select User</label>
                <select class="form-control select2 {{ $errors->has('user_id') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    <option value="">Select a user...</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $formulirPendaftaran->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('user_id'))
                    <span class="text-danger">{{ $errors->first('user_id') }}</span>
                @endif
            </div>
            @endif
            <div class="form-group">
                <label class="required" for="name">Nama</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $formulirPendaftaran->nama) }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>
            <!-- Additional fields -->
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $formulirPendaftaran->email) }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="telp">Telp</label>
                <input class="form-control {{ $errors->has('telp') ? 'is-invalid' : '' }}" type="text" name="telp" id="telp" value="{{ old('telp', $formulirPendaftaran->telp) }}">
                @if($errors->has('telp'))
                    <span class="text-danger">{{ $errors->first('telp') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <input class="form-control {{ $errors->has('agama') ? 'is-invalid' : '' }}" type="text" name="agama" id="agama" value="{{ old('agama', $formulirPendaftaran->agama) }}">
                @if($errors->has('agama'))
                    <span class="text-danger">{{ $errors->first('agama') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="ttl">TTL</label>
                <input class="form-control {{ $errors->has('ttl') ? 'is-invalid' : '' }}" type="text" name="ttl" id="ttl" value="{{ old('ttl', $formulirPendaftaran->ttl) }}">
                @if($errors->has('ttl'))
                    <span class="text-danger">{{ $errors->first('ttl') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control select2 {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}" name="jenis_kelamin" id="jenis_kelamin" required>
                    <option value="">pilih</option>
                    @foreach($jenis_kelamins as $jenis_kelamin)
                        <option value="{{ $jenis_kelamin['name'] }}" {{ old('jenis_kelamin', $formulirPendaftaran->jenis_kelamin) == $jenis_kelamin['name'] ? 'selected' : '' }}>{{ $jenis_kelamin->name'] }}</option>
                    @endforeach
                </select>
                @if($errors->has('jenis_kelamin'))
                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat">{{ old('alamat', $formulirPendaftaran->alamat) }}</textarea>
                @if($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="kode_pos">Kode Pos</label>
                <input class="form-control {{ $errors->has('kode_pos') ? 'is-invalid' : '' }}" type="text" name="kode_pos" id="kode_pos" value="{{ old('kode_pos', $formulirPendaftaran->kode_pos) }}">
                @if($errors->has('kode_pos'))
                    <span class="text-danger">{{ $errors->first('kode_pos') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="nama_keluarga">Nama Keluarga</label>
                <input class="form-control {{ $errors->has('nama_keluarga') ? 'is-invalid' : '' }}" type="text" name="nama_keluarga" id="nama_keluarga" value="{{ old('nama_keluarga', $formulirPendaftaran->nama_keluarga) }}">
                @if($errors->has('nama_keluarga'))
                    <span class="text-danger">{{ $errors->first('nama_keluarga') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="nomor_kartu_keluarga">Nomor Kartu Keluarga</label>
                <input class="form-control {{ $errors->has('nomor_kartu_keluarga') ? 'is-invalid' : '' }}" type="text" name="nomor_kartu_keluarga" id="nomor_kartu_keluarga" value="{{ old('nomor_kartu_keluarga', $formulirPendaftaran->nomor_kartu_keluarga) }}">
                @if($errors->has('nomor_kartu_keluarga'))
                    <span class="text-danger">{{ $errors->first('nomor_kartu_keluarga') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="jumlah_anak">Jumlah Anak</label>
                <input class="form-control {{ $errors->has('jumlah_anak') ? 'is-invalid' : '' }}" type="text" name="jumlah_anak" id="jumlah_anak" value="{{ old('jumlah_anak', $formulirPendaftaran->jumlah_anak) }}">
                @if($errors->has('jumlah_anak'))
                    <span class="text-danger">{{ $errors->first('jumlah_anak') }}</span>
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
