@extends('layouts.app')
@section('content')
<div class="login-box d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="card shadow" style="width: 400px; border-radius: 14px;">
        <div class="card-body login-card-body p-4">
            <div class="text-center mb-3">
                <img src="{{ asset('logo-perusahaan.png') }}" alt="Logo" class="img-fluid mb-2" style="width:120px;">
                <h5 class="mb-1" style="font-weight:700; color:#1a202c;"> <a href="{{ route('homepage') }}" class="text-black">Sistem Informasi Distribusi Pekerjaan Instalasi Listrik</a></h5>
                <span class="text-muted" style="font-size: 0.95em;">PT Graha Artha</span>
            </div>
            <hr>
            <p class="login-box-msg mb-3" style="font-size:1.1em; font-weight:500;">Login</p>

            @if(session()->has('message'))
                <p class="alert alert-info">
                    {{ session()->get('message') }}
                </p>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="Email" name="email" value="{{ old('email', null) }}">
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                        <label for="remember" class="form-check-label" style="font-size:0.97em;">Ingat Saya</label>
                    </div>
                    <a href="{{ url('register') }}" class="btn btn-link p-0" style="font-size:0.97em;">Daftar Akun Teknisi</a>
                </div>

                <button type="submit" class="btn btn-primary btn-block w-100" style="font-weight:600;">
                    Login
                </button>
            </form>
        </div>
    </div>
</div>
@endsection