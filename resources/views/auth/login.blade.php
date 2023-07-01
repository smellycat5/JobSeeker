@extends('layouts.base')
@section('content')
<section>
        <div class="container">
            <form class="login-form" action={{ route('loginUser') }} method="POST">
                <h2>Log In</h2>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
</section>
@endsection