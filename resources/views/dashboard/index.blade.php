<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
</head>
<body>
    <header class="px-3 py-1">
        <nav>
            <!-- Logo Icon -->
            <div class="logo">
                <a href="index.html">
                    <img src="{{ asset('assets/img/landing/logo3.png') }}" alt="logo mitruck" class="logo-img">
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
                    <a href="#" class="btn btn-danger">Masuk</a>
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

    <main>
        <div class="content row">
            <div class="col-md-4 card w-100">
                Aku ganteng
            </div>
            <div class="col-md-8 card w-100">
                banget
            </div>
        </div>
    </main>

    <script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('assets/js/mdb.min.js') }}"></script>
</body>
</html>