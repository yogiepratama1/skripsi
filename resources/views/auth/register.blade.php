@extends('layouts.app')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <div class="login-logo">
            <!-- add logo -->
            <img src="{{ asset('logo-perusahaan.jpg') }}" alt="Logo" class="img-fluid" width="250">
            <br>
            <a href="{{ url('') }}">
                {{ env('JUDUL') }}
            </a>
        </div>
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
                    <input id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autocomplete="name" autofocus placeholder="name" name="name" value="{{ old('name', null) }}">

                    @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="Email" name="email" value="{{ old('email', null) }}">

                    @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                    @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                    @endif
                </div>


                <div class="row">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        Register
                    </button>
                    <div class="col-4" style="margin-top: 15px;">
                        <a class="btn btn-info btn-block btn-flat" href="{{ route('login') }}" style="color: white;">Login</a>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">

            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection