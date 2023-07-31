@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <!-- add logo -->
        <img src="{{ asset('logo-perusahaan.png') }}" alt="Logo" class="img-fluid" width="250">
        <br>
        Sistem Informasi Pendaftaran Peserta Pensiun
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">
                Register
            </p>

            @if(session()->has('message'))
                <p class="alert alert-info">
                    {{ session()->get('message') }}
                </p>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="form-group">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autocomplete="name" autofocus placeholder="Full Name" name="name" value="{{ old('name', null) }}">

                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" placeholder="Email" name="email" value="{{ old('email', null) }}">

                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="Password" name="password">

                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input id="password_confirmation" type="password" class="form-control" required placeholder="Confirm Password" name="password_confirmation">
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            Register
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                Already have an account? <a href="{{ route('login') }}">Login here</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection
