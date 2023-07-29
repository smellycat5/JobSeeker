@extends('layouts.base')
@section('content')
<section>
    <div class="container d-flex justify-content-center  mt-5">
        <div class="col-md-5 border bg-dark-subtle">
            <form class="card p-5 border-0 rounded-0 bg-dark-subtle" method="POST" action="{{ route('register') }}">
                <div class="text-center">
                    <h2 class="font-bold">{{ __('Sign up') }}</h2>
                </div>

                @csrf

                <!-- Name -->
                <div class="form-group mt-3">
                    <label for="name" class="col-form-label">Name</label>
                    <input type="name" name="name" class="form-control form-control-lg" required>
                </div>

                <!-- Email Address -->
                <div class="form-group mt-3">
                    <label for="email" class="col-form-label">Email</label>
                    <input type="email" name="email" class="form-control form-control-lg" required>
                </div>

                <!-- Password -->
                <div class="form-group mt-3">
                    <label for="password" class="col-form-label">Password</label>

                    <input type="password" name="password" class="form-control form-control-lg" required>
                </div>

                {{-- <!-- Confirm Password -->
                <div class="form-group mt-5">
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Confirm Password" required>
                </div> --}}

                <div class="text-center mt-4 color-blue">
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

                <button type="submit" class="btn btn-primary btn-block mt-4">
                    {{ __('Register') }}
                </button>

            </form>
        </div>
    </div>
</section>
@endsection
