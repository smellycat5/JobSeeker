@extends('layouts.base')
@section('content')
    <section>
        <div class='container'>
            <form class='login-form' method="POST" action="{{ route('register') }}">
                <div>
                    <h2>Sign up</h2>
                </div>
                @csrf

                <!-- Name -->
                <div class="mt-5">
                    <input type="name" name="name" placeholder="Name" required>
                </div>

                <!-- Email Address -->
                <div class="mt-5">
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <!-- Password -->
                <div class="mt-5">
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                {{-- <!-- Confirm Password -->
                <div class="mt-5">
                <input type="email" name="" placeholder="Confirm Password" required>
                </div> --}}

                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button type="submit">Register</button>
                </div>
            </form>
        </div>
    </section>
@endsection
