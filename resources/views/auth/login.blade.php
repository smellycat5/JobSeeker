@extends('layouts.base')
@section('content')
    <section>
        <div class="container">
            <form class="login-form" action={{ route('loginUser') }} method="POST">
                @csrf
                <h2 >Log In</h2>
                <!-- Email -->
                <div class="mt-5">
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <!-- Password -->
                <div class="mt-5">
                    <input type="password" name="password" placeholder="Password" required>
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
