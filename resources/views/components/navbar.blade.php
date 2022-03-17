<nav class=" navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Lapor PC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">Home <span
                            class="sr-only">(current)</span></a>
                </li>
                @auth
                    <li class="nav-item {{ Request::is('lapor*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/lapor') }}">Lapor PC Rusak</a>
                    </li>
                @endauth
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-expanded="false">
                            Our Social Media
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#"><i class="bi bi-instagram"></i>&nbsp; Instagam</a>
                            <a class="dropdown-item" href="#"><i class="bi bi-facebook"></i>&nbsp; Facebook</a>
                            <a class="dropdown-item" href="#"><i class="bi bi-telegram"></i>&nbsp; Telegram</a>
                            <a class="dropdown-item" href="#"><i class="bi bi-whatsapp"></i>&nbsp; WhatsApp</a>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                    <div class="dropdown">
                        <a class="text-decoration-none text-white dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }} !
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ url('dashboard') }}" class="dropdown-item"><i class="bi bi-postcard"></i>&nbsp;
                                My Dashboard</a>
                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal">
                                <i class="bi bi-box-arrow-right"></i>&nbsp; Logout
                            </button>
                        </div>
                    </div>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('#auth') }}" data-toggle="modal" data-target="#auth">
                            <i class="bi bi-box-arrow-right"></i>&nbsp; Login
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
