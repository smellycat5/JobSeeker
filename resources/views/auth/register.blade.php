@extends('layouts.base')
@section('content')
    <section>
        <div class='container'>
            <form class='login-form' method="POST" action="{{ route('register') }}">
                <div>
                    <h2 class="center-text">Sign up</h2>
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

                <div class="center-text mt-4 color-blue">
                    <a href="{{ route('login') }}">
                        Already registered?
                    </a>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger mt-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="submit">Register</button>

            </form>
        </div>
    </section>
@endsection
