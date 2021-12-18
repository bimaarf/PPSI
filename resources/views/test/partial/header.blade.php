{{-- header --}}
<header class="header">

    {{-- Gambar Logo --}}
    <div class="logo">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/img/landing/logo3.png') }}" alt="">
        </a>
    </div>
    {{----------------}}

    {{-- Navigation Bar --}}
    <nav class="navbar">
        <a href="#" class="nav-link">Solusi Bisnis</a>
        <a href="#" class="nav-link">Pesan Armada</a>
        <a href="#" class="nav-link">Mitra Driver</a>

        {{-- Dropdown Navigation Bar --}}
        <div class="dropdown " id="dropdown-link">
            <a href="#" class="nav-link">
                Perusahaan
            </a>
            <div id="dropdown-menu" class="dropdown-menu">
                <a href="#" class="dropdown-item">About</a>
                <a href="#" class="dropdown-item">Contact</a>
                <a href="#" class="dropdown-item">Blog</a>
                <a href="#" class="dropdown-item">Join With Us!</a>
            </div>
        </div>
        {{-----------------------------}}

    </nav>
    {{------------------------}}

    {{-- Navigation Toggle dan Foto Profil --}}
    <div class="nav-toggle">
        <div class="profil">
            <div class="foto-profil">
                <img src="{{ asset(Auth::user()->avatar) }}" alt="" class="nama">
            </div>
            {{-- <i class="far fa-user-circle fa-2x"></i> --}}
            <span class="nama">
                @php
                    $nama = Auth::user()->name;
                    echo strtok($nama, " ");
                @endphp
            </span>
        </div>
        <div class="toggle" id="toggle">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </div>
    {{----------------------}}

</header>
{{--------------------}}