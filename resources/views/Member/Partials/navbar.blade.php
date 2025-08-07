<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('FE/img/logo.png') }}" alt="Billiard Pro Logo" class="logo-nav me-2">
            <span>Home Billiard</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#features">Fasilitas</a></li>
                <li class="nav-item"><a class="nav-link" href="/#tables">Meja Billiard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/#gallery') }}">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="#testimonials">Testimoni</a></li>
                @if (Auth::guard('member')->check())
                    <li class="nav-item"><a class="nav-link" href="{{ url('profile') }}">Profile</a></li>
                    <form action="{{ url('logout') }}" method="post">
                        @csrf
                        <li class="nav-item"><button type="submit" class="nav-link btn btn-danger-custom btn-sm ms-3">Logout</button></li>
                    </form>
                @else
                    <li class="nav-item"><a class="nav-link btn btn-primary-custom btn-sm ms-3"
                        href="{{ url('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
