<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>

    <link rel="stylesheet" href="{{ asset('assets/css/brand.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* border: 1px solid red; */
        }

        body{overflow-x: hidden}

        header {
            background-color: white;
            width: 100%;
            padding: 1rem;
            display: flex;
            justify-content: space-around;
            align-items: center;
            box-shadow: 0 0 4px 1px rgba(0, 0, 0, 0.288);
        }


        .logo, .logo img {
            width: 250px;
        }

        nav {
            display: flex;
            gap: 2rem;
        }

        nav a {
            text-decoration: none;
            color: var(--dark);
        }

        nav a::after{
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background-color: var(--danger);
            transition: width .3s;
        }

        nav a:hover{
            font-weight: bolder;
        }

        nav a:hover::after {
            width: 100%;
        }

        #dropdown-menu {
            position: absolute;
            background-color: #ffffff;
            display: none;
            /* border: 1px solid var(--dark); */
            border-radius: .5rem;
        }

        .dropdown-item{
            padding: .5rem 1rem;
            display: block;
        }

        #dropdown-menu.show {
            display: block;
        }

        .nav-toggle {
            display: flex;
            gap: 1rem;
            align-items: center
        }

        .profil {
            background-color: var(--danger);
            padding: 6px;
            padding-right: 10px;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: .3rem;
            border-radius: 20px;
            cursor: pointer;
        }

        .foto-profil {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: var(--light);
        }

        .toggle {
            display: none;
            cursor: pointer;
            border: 2px solid var(--dark);
            border-radius: 5px;
        }

        .toggle:hover{
            box-shadow:  0 0 2px 1px rgba(0, 0, 0, 0.288);
        }

        .toggle div {
            width: 25px;
            height: 3px;
            margin: 5px;
            background-color: var(--dark);
            transition: all 0.3s ease;
        }

        .toggle-active .line1 {
            transform: rotate(-45deg) translate(-5px, 6px);
        }
        
        .toggle-active .line2 {
            opacity: 0;
        }
        
        .toggle-active .line3 {
            transform: rotate(45deg) translate(-5px, -6px);
        }

        main {
            margin: 50px 100px;
            border-radius: 30px;
            display: flex;
            gap: 2rem;
        }

        aside {
            width: 280px;
            height: 70vh;
            background-color: #ffffff;
            border: 1px solid #d1d1d1;
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }

        .identitas {
            padding: 20px; 
            display: flex; 
            align-items: center; 
            gap: 1rem; 
            justify-content: start;
            border-bottom: 1px solid #d1d1d1;
        }

        .foto-identitas {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--light);
        }
        
        .sidebar {
            padding: 20px;
        }

        .sidelink {
            padding: 15px 20px;
            list-style: none;
            margin: 5px 0;
            border-radius: 15px;
        }

        .sidelink.active {
            background-color: var(--danger);
            
        }

        .sidelink.active a, .logout a {
            color: var(--light) !important;
        }

        .sidelink a{
            text-decoration: none;
            color: var(--dark);
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .logout {
            position: relative;
            top: 100px;
            background-color: var(--primary);
        }

        section {
            width: 75%;
            height: 70vh;
            background-color: #ffffff;
            border: 1px solid #d1d1d1;
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;
        }

        .judul {
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #d1d1d1;
        }

        .perbarui-judul {
            cursor: pointer;
            background-color: var(--info);
            padding: 5px 20px;
            color: #fff;
            border-radius: 20px;
            font-size: 12px;
        }

        .isi {
            padding: 20px;
        }

        .isi div {
            margin-bottom: 15px;
        }

        .isi div p {
            margin-left: 20px;
            font-size: 15px;
        }

        @media screen and (max-width:1000px){ nav {gap: 1rem;} }
        
        @media screen and (max-width:900px){
            header {justify-content:space-between;}

            nav {
                position: absolute;
                top: 11vh;
                background-color: white;
                width: 50%;
                height: 89vh;
                padding: 2rem;
                flex-direction: column;
                justify-content: start;
                gap: 2rem;
                align-items: baseline;
                transform: translateX(200%);
                transition: transform 0.3s ease;
                border: 1px solid var(--light);
            }

            nav.active {transform: translateX(100%);}
            #dropdown-menu{background-color: var(--light);}
            .nav-toggle {justify-content: start;}
            .toggle {display: block;}

            .sidelink {padding: 10px 15px;}
        }

        @media screen and (max-width: 680px){
            main {
                flex-direction: column;
                
            }
            aside {
                width: 100%;
                height: auto;
                border-bottom-left-radius: 0;
                border-top-right-radius: 30px;
                display: flex;
                padding: 0 20px;
            }

            .identitas {
                display: block;
                border-bottom:0;
                padding: 0;
                margin: 10px;
            }

            .sidebar {
                display: flex;
                flex-direction: row;
                padding: 0;
                align-items: center;
            }

            .sidelink {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                margin: 10px;
                padding: auto;
                align-items: center;
                justify-content: center;
            }

            
            .nav-side span, .nama-identitas {display: none}
        }

        @media screen and (max-width:500px){
            .logo, .logo img { width: 200px}
            .profil {padding: 2px;}
            .profil span {display: none;}
            .foto-profil {width: 32px;height: 32px;}
            nav {top:10vh;width: 60%;}
            nav.active {transform: translateX(65%);}
        }

        @media screen and (max-width: 335px){
            header {padding: .5rem;}
            .logo, .logo img { width: 175px}
            nav {top:6.5vh;width: 70%;}
            nav.active {transform: translateX(40%);}
            .nav-toggle {gap: .5rem}
            .foto-profil {width: 23px; height: 23px}
            .toggle div {width: 18px; height: 2px; margin: 4px;}
            .toggle-active .line1 {transform: rotate(-40deg) translate(-4px, 5px);}
            .toggle-active .line3 {transform: rotate(40deg) translate(-4px, -4px);}
        }

    </style>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
</head>
<body>
    <header>
        <div class="logo">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/img/landing/logo3.png') }}" alt="">
            </a>
        </div>
        <nav class="navbar">
            <a href="#" class="nav-link">Solusi Bisnis</a>
            <a href="#" class="nav-link">Pesan Armada</a>
            <a href="#" class="nav-link">Mitra Driver</a>
            <!-- Dropdown navbar -->
            <div class="dropdown " id="dropdown-link">
                <a href="#" class="nav-link">
                    Perusahaan
                </a>
                <div id="dropdown-menu">
                    <a href="#" class="dropdown-item">About</a>
                    <a href="#" class="dropdown-item">Contact</a>
                    <a href="#" class="dropdown-item">Blog</a>
                    <a href="#" class="dropdown-item">Join With Us!</a>
                </div>
            </div>
        </nav>
        <div class="nav-toggle">
            <div class="profil">
                <div class="foto-profil"></div>
                <span>Ramadhan</span>
            </div>
            <div class="toggle" id="toggle">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </div>
    </header>

    <main>
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