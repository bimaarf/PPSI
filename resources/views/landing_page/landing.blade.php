<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
</head>
<body>

    <!-- Header dan navigation bar -->
    {{-- <header class="fixed-top px-3 py-1"> --}}
    <header class="fixed-top px-3 py-1">
        <nav>
            <!-- Logo Icon -->
            <div class="logo">
                <a href="index.html">
                    <!-- <div class="img-fluid img logo-img"></div> -->
                    <img src="{{ asset('assets/img/landing/logo2.png') }}" alt="logo mitruck" class="logo-img">
                    <img src="{{ asset('assets/img/landing/logo3.png') }}" alt="logo mitruck" class="logo-img hidden">
                </a>
            </div>

            <!-- Navigation Bar -->
            <ul class="navbar nav">
                <li><a href="#" class="nav-link">Solusi Bisnis</a></li>
                <li><a href="#" class="nav-link">Pesan Armada</a></li>
                <li><a href="#" class="nav-link">Mitra Driver</a></li>
                <!-- Dropdown navbar -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" role="button" data-toggle="dropdown" aria-expanded="false">
                    Perusahaan
                    </a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">About</a>
                        <a href="#" class="dropdown-item">Contact</a>
                        <a href="#" class="dropdown-item">Blog</a>
                        <a href="#" class="dropdown-item">Join With Us!</a>
                    </div>
                </li>
                <!-- Login Button -->
                <div class="login">
                    <a href="#" class="btn btn-outline-light">Masuk</a>
                </div>
            </ul>
            <!-- Burger button pada mobile navigation bar -->
            <div class="nav-toggler">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
    </header>

    <!-- Hero landing page mittruck -->
    <section id="hero" class="d-flex flex-column justify-content-center position-absolute">
        <div class="container">
            <div class="justify-content-start">
                <div class="text-white">
                    <h1>Just meet your truck, <br> and load! </h1>
                </div>
            </div>
        </div>
    </section>

    <!-- shipper and driver card -->
    <div class="sdcards">
        <div class="card bg-danger text-center text-white">
            <img src=" {{ asset('assets/img/landing/shipper.png') }}" alt="shipper" class="card-img-top mx-auto d-block">
            <div class="card-body">
                <h3 class="card-title">Shipper</h3>
                <p class="card-text">Ayo, kirim barang anda disini.</p>
            </div>
            <a href="#" class="link-card text-right">Lebih Lanjut</a>
        </div>
        <div class="card bg-danger text-center text-white">
            <img src="{{ asset('assets/img/landing/driver.png') }}" alt="driver" class="card-img-top mx-auto d-block">
            <div class="card-body">
                <h3 class="card-title">Driver</h3>
                <p class="card-text">Mari bergabung dan dapatkan order.</p>
            </div>
            <a href="#" class="link-card text-right">Lebih Lanjut</a>
        </div>
    </div>

    <!-- Features Section -->
    <section class="position-relative w-100 superiority my-5">
        <div class="container super-content">
            <div class="sup-title">
                <h6>kirim di mitruck</h6>
                <h2>Lebih Mudah, Efisien, dan Aman</h2>
            </div>
            <div class="row sup-content">
                <div class="image-ame col-lg-6 "></div>
                <div class="col-lg-6">
                    <div class="icon-box mt-5 mt-lg-0 super1">
                        <img src="assets/img/landing/mudah.png" alt="lebih mudah" width="48px">
                        <h4>Lebih Mudah</h4>
                        <p>Cukup daftar melalui website ini, dan dapatkan armada dengan instan</p>
                    </div>
                    <div class="icon-box mt-5 super2">
                        <img src="assets/img/landing/efisien.png" alt="efisien" width="48px">
                        <h4>Efisien</h4>
                        <p>Tarif transparan langsung dari driver dengan bayar tunai maupun transfer</p>
                    </div>
                    <div class="icon-box mt-5 super3">
                        <img src="assets/img/landing/aman.png" alt="lebih mudah" width="48px">
                        <h4>Aman</h4>
                        <p>Selalu memastikan driver dan kendaraan dengan performa baik, dan dengan i asuransi menjadi lebih tenang</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Features Section -->


    <!-- Jangkauan Section -->
    <section class="position-relative w-100 jangkauan text-white my-5">
        <div class="container jangkauan-content">
            <div class="text-center jc-text position-relative">
                <h2>Dukungan Armada Terbaik <br> Solusi Bisnis Anda</h2>
            </div>
            <div class="row position-relative js-isi">
                <div class="col-lg-6 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1" class="purecounter">
                    </span>
                    <p>Armada & Driver</p>
                </div>
                <div class="col-lg-6 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="1" class="purecounter">
                    </span>
                    <p>Jangkauan Kota</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Jangkauan Section -->

    <!--  Armada Section -->
    <section id="Armada" class="armada position-relative w-100 my-5">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="assets/img/landing/f5.jpg" class="" alt="Foto1">
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="assets/img/landing/f2.jpg" class="" alt="Foto2">
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="assets/img/landing/f3.jpg" class="" alt="Foto3">
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="assets/img/landing/f4.jpg" class="" alt="Foto4">
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="assets/img/landing/f5.jpg" class="" alt="Foto5">
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src=" {{ asset('assets/img/landing/f5.jpg') }} " class="" alt="Foto5">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Armada Section -->

    <!-- Hubungi Section -->
    <div class="container position-relative w-100 my-5 hubungi">
        <h2 class="text-center">Sebagai solusi korporasi & info lainnya.</h2>
        <div class="mb-4">
            <div class="text-center mt-4"><button type="submit" class="btn btn-warning rounded-pill text-white">Kontak Segera</button>
            </div>
        </div>
    </div>
    <!-- Akhir Hubungi Section -->

    <!-- Footer -->
    <footer class="footer position-relative w-100 my-5 bg-danger py-4">
        <div class="container text-lg-start">
            {{-- <h3 class="">MADA</h3> --}}
            <img src="{{ asset('assets/img/landing/Mada.png') }}" alt="logo mada" class="mada">
            <div class="mb-2 pb-5 row">
                <a href="#" class="text-white">Tentang</a>
                <a href="mitdriv.html" class="text-white">Produk</a>
                <a href="#" class="text-white">Blog</a>
            </div>
            <div class="post-title text-white">
                <h6><strong><span>PT. Mada Jejaring Tenggara. 2021</span></strong>. All Rights Reserved</h6>
            </div>
            <div class="credits">
                <a href="#" class="text-white">Syarat & Ketentuan</a>
                <a href="#" class="m-2 text-white">Kebijakan Privasi</a>
            </div>
        </div>
    </footer>
    <!-- Akhir Footer -->

    <script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('assets/js/mdb.min.js') }}"></script>
    <script src="{{ asset('assets/js/purecounter.js') }}"></script>
    <script src="{{ asset('assets/js/landing.js') }}"></script>
</body>
</html>