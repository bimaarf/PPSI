<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitruck</title>

    <!-- ***** Font Awesome Icon ***** -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- ***** Brand Style ***** -->
    <link rel="stylesheet" href="{{ asset('assets/css/brand.css') }}">

    <!-- ***** Style Umum ***** -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- ***** Style Khusus ***** -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

</head>

<body>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <div class="logo">
            <a href="/">
                <img src="{{ asset('assets/img/Logo2.png') }}" alt="logo putih" class="header-logo" id="logo-putih">
                <img src="{{ asset('assets/img/Logo3.png') }}" alt="logo hitam" class="header-logo d-none"
                    id="logo-hitam">
            </a>
        </div>

        <nav class="navbar">
            <a href="/" class="nav-link @yield('solusi-bisnis')">Solusi Bisnis</a>
            <a href="/pesan-armada" class="nav-link @yield('pesan-armada')">Pesan Armada</a>
            <a href="/mitra-driver" class="nav-link @yield('mitra-driver')">Mitra Driver</a>

            <div class="dropdown" id="dropdown-link">
                <span class="nav-link">
                    Perusahaan
                    <i class="fas fa-sort-down"></i>
                </span>
                <div id="dropdown-menu" class="dropdown-menu">
                    <a href="/contact" class="dropdown-item @yield('contact')">Contact</a>
                    <a href="/blog" class="dropdown-item">Blog</a>
                </div>
            </div>
        </nav>

        <div class="nav-toggle">
            @if (Auth::check())
                <div onclick="logout()" class="btn-logged">
                    Logout
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button id="logoutTrue" class="dropdown-item d-none" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-logged" style="text-decoration: none">
                    Masuk
                </a>
            @endif
            <div class="toggle" id="toggle">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </div>

    </header>
    <!-- ***** Header Area End ***** -->


    @yield('content')

    <!-- ***** Footer Start ***** -->
    <footer class="footer">
        <div class="footer-links">
            <div class="footer-menu">
                <img src="{{ asset('assets/img/Mada.png') }}" alt="logo mada" class="mada">
                <div class="footer-link">
                    <a href="#" class="text-white">Tentang</a>
                    <a href="#" class="text-white">Produk</a>
                    <a href="#" class="text-white">Blog</a>
                </div>
            </div>
            <div class="footer-socials">
                <p>Media Sosial</p>
                <a href="#"><img src="{{ asset('assets/img/facebook.png') }}" alt="facebook"></a>
                <a href="#"><img src="{{ asset('assets/img/instagram.png') }}" alt="instagram"></a>
                <a href="#"><img src="{{ asset('assets/img/youtube.png') }}" alt=""></a>
            </div>
        </div>
        <div class="footer-info">
            <div class="footer-name">
                PT. Mada Jejaring Tenggara. 2021. All Rights Reserved
            </div>
            <div class="footer-credits">
                <a href="#" class="text-white">Syarat & Ketentuan</a>
                <a href="#" class="m-2 text-white">Kebijakan Privasi</a>
            </div>
        </div>
    </footer>
    <!-- ***** Footer End ***** -->

    <!-- ***** Purecounter.js ***** -->
    <script src="{{ asset('assets/plugins/purecounter/purecounter_vanilla.js') }}"></script>
    <!-- ***** Script ***** -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function logout() {
            swal({
                title: "Log out!",
                text: "Are you sure you want to log out?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
            }).then((result) => {
                if (result.dismiss !== 'cancel') {
                    $("#logoutTrue").click();
                }
            })
        }
    </script>
</body>

</html>
