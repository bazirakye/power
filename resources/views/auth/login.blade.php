@extends('layouts.front.home')

@section('content')

<div class="row justify-content-center ">
    <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
        <h3>Wenreco</h3>
        </div>
        <div class="card-body">
        <p class="login-box-msg">Sign in to access the system</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group mb-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="input-group mb-3">
            <input id="password"type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                    Remember Me
                </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
            </div>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
                </a>
            @endif
            <a class="btn btn-link" href="{{ route('register') }}">
                {{ __('Click to register') }}
            </a>
        </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
</div>    
@endsection
