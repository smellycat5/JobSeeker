@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-5 border-0 rounded-0 bg-dark-subtle">
                    <!-- Remove rounded-lg class and add rounded-0 class -->
                    <div class="text-center">
                        <h2 class="font-bold">{{ __('Login') }}</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="font-bold">{{ __('Email') }}</label>
                                <input id="email" type="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="font-bold">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="center-text mt-4">
                                <a href="{{ route('register') }}">
                                    Create an Account
                                </a>
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="form-group">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
