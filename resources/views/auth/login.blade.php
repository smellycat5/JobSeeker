@extends('layouts.base')
@section('content')
    <section>
        <div class="container">
            <form class="login-form" action={{ route('loginUser') }} method="POST">
                @csrf
                <h2 >Log In</h2>
                <!-- Email -->
                <div class="mt-5">
                    <input type="email" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mt-5">
                    <input type="password" name="password" class="form-control @error('email') is-invalid @enderror" placeholder="Password" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
        
                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('register') }}">
                        {{ __('Create an Account') }}
                    </a>

                <button type="submit">Login</button>
            </form>
        </div>
    </section>
@endsection
