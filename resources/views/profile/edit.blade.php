@extends('layouts.app') {{-- Sesuaikan dengan layout utama Anda --}}

@section('content')
<div class="container">
    <h2>Edit Profil</h2>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $user->profile->nama_lengkap ?? '') }}">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ old('alamat', $user->profile->alamat ?? '') }}</textarea>
        </div>
        <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon', $user->profile->nomor_telepon ?? '') }}">
        </div>
        <div class="form-group">
            <label>Foto Profil</label>
            <input type="file" name="foto_profil" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    </form>
</div>
@endsection