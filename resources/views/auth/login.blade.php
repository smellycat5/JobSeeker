@extends('layouts.base')
@section('content')
    <section>
        <div class="container">
            <form class="login-form" action={{ route('loginUser') }} method="POST">
                @csrf
                <h2 class="center-text">Log In</h2>
                <!-- Email -->
                <div class="mt-5">
                    <input type="email" name="email" placeholder="Email" class="form-control" required autocomplete="email"
                        autofocus>
                </div>

                <!-- Password -->
                <div class="mt-5">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="center-text mt-4 color-blue">
                    <a href="{{ route('register') }}">
                        Create an Account
                    </a>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="submit">Login</button>
            </form>
        </div>
    </section>
@endsection
