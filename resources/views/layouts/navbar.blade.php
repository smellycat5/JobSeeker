{{-- <nav>
    <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Ram</a></li>
    </ul>
</nav> --}}

<nav class="navbar-container">
    <div class="navbar-logo">
        <a href='/'>Logo</a>
    </div>
    <div class="navbar-center">
        <a href="/">Home</a>
        <a href="/job">Jobs</a>
        <a href="/about">About</a>
    </div>
    <div class="navbar-profile">
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="logout-button">{{ __(auth()->user()->name) }}, Logout?</button>
            </form>
        @else
            <form action="{{ route('login') }}">
                @csrf
                <button class="logout-button">Login</button>
            </form>
        @endauth
    </div>
</nav>