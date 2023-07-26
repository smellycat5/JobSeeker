<nav>
    <div class="navbar-logo">
        <a href='/' class="theme">Logo</a>
    </div>
    <div class="navbar-center">
        <a href="/" class="theme">Home</a>
        <a href="/job" class="theme">Jobs</a>
        <a href="/about" class="theme"  >About</a>
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