<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>

    <link rel="stylesheet" href="{{ asset('assets/css/brand.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <!-- Font Awesome -->
    <script src="{{ asset('assets/js/icons.js') }}"></script>
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" /> --}}
</head>
<body>

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
                {{-- <div class="foto-profil"></div> --}}
                <i class="far fa-user-circle fa-2x"></i>
                <span>Ramadhan</span>
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

    {{--  --}}
    <main class="content">
        <aside class="menu">
            <div class="identitas">
                <div class="foto-identitas"></div>
                <span class="nama-identitas">Ramadhan</span>
            </div>
            <ul class="sidebar">
                <li class="sidelink active">
                    <a href="#" class="nav-side">
                        <i class="fas fa-user"></i>
                        <span>Akun Saya</span>
                    </a>
                </li>
                <li class="sidelink">
                    <a href="#" class="nav-side">
                        <i class="fas fa-envelope"></i>
                        <span>Kotak Masuk</span>
                    </a>
                </li>
                <li class="sidelink">
                    <a href="#" class="nav-side">
                        <i class="fas fa-history"></i>
                        <span>Riwayat Pesanan</span>
                    </a>
                </li>
                <li class="sidelink logout">
                    <a href="#" class="nav-side">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Keluar</span>
                    </a>
                </li>
            </ul>
        </aside>
        <section>
            <div class="judul">
                <h3 class="text-judul">Profil</h3>
                <div class="perbarui-judul">Perbarui Profil</div>
            </div>
            <div class="isi">
                <div>
                    <h4>Status</h4>
                    <p>Shipper</p>
                </div>
                <div>
                    <h4>Nama Lengkap</h4>
                    <p>Ramadhan</p>
                </div>
                <div>
                    <h4>Alamat</h4>
                    <p>Desa Kuala Dua, Dusun Karya II, Jl. Kembang Wonosari, Gg. Mekar, Kec. Sungai Raya, Kabupaten Kubu Raya</p>
                </div>
                <div>
                    <h4>No. HP</h4>
                    <p>+6283151834395</p>
                </div>
                <div>
                    <h4>Email</h4>
                    <p>madha@student.untan.ac.id</p>
                </div>
            </div>
        </section>
    </main>

    <script>
        const dropdownLink = document.getElementById("dropdown-link")
        const dropdownMenu = document.getElementById("dropdown-menu")
        const toggle = document.getElementById('toggle')
        const lines = document.querySelectorAll('.toggle div')
        const navbar = document.querySelector('nav')

        dropdownLink.addEventListener("mouseenter", () => {
            dropdownMenu.classList.add("show")
        })
        dropdownLink.addEventListener("mouseleave", () => {
            setTimeout(() => {
                dropdownMenu.classList.remove("show")
            }, 300)
        })


        toggle.addEventListener('click', () => {
            toggle.classList.toggle('toggle-active')
            navbar.classList.toggle('active')
        })
    </script>
</body>
</html>