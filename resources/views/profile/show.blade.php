@extends('layouts.app') {{-- Sesuaikan dengan layout utama Anda --}}

@section('content')
<div class="container">
    <h2>Profil Saya</h2>
    <a href="{{ route('profile.edit') }}" class="btn btn-primary mb-3">Edit Profil</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Nama Lengkap:</strong> {{ $user->profile->nama_lengkap ?? 'Belum diisi' }}</p>
    <p><strong>Alamat:</strong> {{ $user->profile->alamat ?? 'Belum diisi' }}</p>
    <p><strong>Nomor Telepon:</strong> {{ $user->profile->nomor_telepon ?? 'Belum diisi' }}</p>
    @if($user->profile && $user->profile->foto_profil)
        <img src="{{ asset('storage/' . $user->profile->foto_profil) }}" alt="Foto Profil" width="150">
    @endif
</div>
@endsection