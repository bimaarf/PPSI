 <!--Main Navigation-->
 <header>

     <!-- Sidebar -->
     <!-- Navbar -->
     <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-none">
         <!-- Container wrapper -->
         <div class="container-fluid">
             <!-- Toggle button -->
             <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                 aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                 <i class="fas fa-bars"></i>
             </button>

             <!-- Brand -->
             <a class="navbar-brand py-2" href="" style="font-family:Verdana, Geneva, Tahoma, sans-serif">
                 <img src="{{ asset('assets/icon/mitruck.png') }}" height="25" alt="" loading="lazy" />
                 {{-- <strong class="fs-3" style="color: rgb(98, 224, 255);">Smart</strong><span><strong
                         class="fs-3" style="color: #229BD8">Truck</strong></span> --}}
             </a>

             @include('layouts.backend.partial.sidebar_m')
             <div class="collapse navbar-collapse text-right">
                 <div id="navbarSupportedContent">
                     <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                         <li class="nav-item">
                             <a class="nav-link " aria-current="page" href="#">Solusi Bisnis</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link @yield('pesan-armada')" href="#">Pesan Armada</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="#">Mitra Driver</a>
                         </li>
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                 data-bs-toggle="dropdown" aria-expanded="false">
                                 Perusahaan
                             </a>
                             <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                 <li><a class="dropdown-item" href="#">Tentang</a></li>
                                 <li><a class="dropdown-item" href="#">Kontak</a></li>
                                 <li><a class="dropdown-item" href="#">Blog</a></li>
                             </ul>
                         </li>
                     </ul>
                 </div>
             </div>



             <ul class="navbar-nav d-flex flex-row d-none d-sm-flex">

                 <!-- Avatar -->
                 <li class="nav-item dropdown">

                     @if (Auth::check())
                         <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center btn btn-danger rounded-pill text-white text-capitalize shadow-none"
                         onclick="logout()">

                             <img src="{{ asset('assets/icon/' . Auth::user()->avatar) }}"
                                 class="rounded-circle img-thumbnail img-fluid" width="32" alt="" loading="lazy" />
                             &nbsp;<span class="fs-5 font-normal">{{ Auth::user()->name }}</span>&nbsp;


                         </a>
                     @else
                         <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center shadow-none" href="#"
                             id="navbarDropdownMenuLinkOne" role="button" data-mdb-toggle="dropdown"
                             aria-expanded="false">
                             <i class="fa fa-user"></i> &nbsp;Masuk
                         </a>
                         <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLinkOne">
                             <li><a class="dropdown-item" href="{{ route('login') }}">Masuk</a></li>
                             <li><a class="dropdown-item" href="{{ route('register') }}">Daftar</a></li>

                             <li>

                                 @if (Auth::check())
                                     <button class="dropdown-item" onclick="logout()">Logout</button>
                                     <form method="POST" action="{{ route('logout') }}">
                                         @csrf
                                         <button class="dropdown-item d-none" href="{{ route('logout') }}"
                                             onclick="event.preventDefault(); this.closest('form').submit();">Logout</button>
                                     </form>
                                 @endif
                             </li>
                         </ul>
                     @endif
                     <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                         <li>

                             @if (Auth::check())
                                 <button class="dropdown-item" onclick="logout()">Logout</button>
                                 <form method="POST" action="{{ route('logout') }}">
                                     @csrf
                                     <button id="logoutTrue" class="dropdown-item d-none" href="{{ route('logout') }}"
                                         onclick="event.preventDefault(); this.closest('form').submit();">Logout</button>
                                 </form>
                             @endif
                         </li>
                     </ul>
                 </li>
             </ul>
             <!-- Right links -->
         </div>
         <!-- Container wrapper -->
     </nav>
     <!-- Navbar -->
 </header>
 <!--Main Navigation-->

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
