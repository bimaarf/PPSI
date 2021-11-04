 <!--Main Navigation-->
 <header>
     <!-- Sidebar -->
     <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
         <!-- Search form -->

         <div class="position-sticky">
             <div class="list-group list-group-flush mx-3 mt-4">
                 @if (Auth::user()->hasRole('shipper'))
                     <a href="{{ route('user.index') }}"
                         class="list-group-item list-group-item-action py-2 ripple shp @yield('dashboard')"
                         aria-current="true">
                         <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
                     </a>
                 @endif
                 @if (Auth::user()->hasRole('driver'))
                     <a href="{{ route('driver.index') }}"
                         class="list-group-item list-group-item-action py-2 ripple   @yield('dashboard')"
                         aria-current="true">
                         <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
                     </a>
                 @endif
                 @if (Auth::user()->hasRole('admin'))
                     <style>
                         .shp {
                             display: none;
                         }

                     </style>
                     <a href="{{ route('admin.index') }}"
                         class="list-group-item list-group-item-action py-2 ripple  @yield('dashboard')"
                         aria-current="true">
                         <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
                     </a>

                 @endif
                 <a href="{{ route('orders.form_1') }}"
                     class="list-group-item list-group-item-action py-2 ripple @yield('struktur.dashboard')"><i
                         class="fas fa-bars fa-fw me-3"></i><span>Form</span></a>
                 <a href="" class="list-group-item list-group-item-action py-2 ripple @yield('detail')">
                     <i class="fas fa-chart-bar fa-fw me-3"></i>
                     <span>Detail</span></a>
                 @if (Auth::user()->hasRole('admin'))
                     <a href="{{ route('admin.add_user') }}"
                         class="list-group-item list-group-item-action py-2 ripple  @yield('add')" aria-current="true">
                         <i class="fas fa-user fa-fw me-3"></i><span>Add User</span>
                     </a>
                 @endif

                 @if (Auth::user()->hasRole('admin'))
                     <span class="sidebar-title list-group-item list-group-item-action py-2 ripple">Daftar &amp;
                         Pengguna</span>
                     <a href="{{ route('admin.table_driver') }}"
                         class="list-group-item list-group-item-action py-2 ripple  @yield('daftar-driver')"
                         aria-current="true">
                         <i class="fas fa-users fa-fw me-3"></i><span>Daftar Driver</span>
                     </a>
                     <a href="{{ route('admin.table_shipper') }}"
                         class="list-group-item list-group-item-action py-2 ripple  @yield('daftar-shipper')"
                         aria-current="true">
                         <i class="fas fa-users fa-fw me-3"></i><span>Daftar Shipper</span>
                     </a>
                     <a href="" class="list-group-item list-group-item-action py-2 ripple  @yield('daftar-field-manager')"
                         aria-current="true">
                         <i class="fas fa-users fa-fw me-3"></i><span>Daftar Field Manager</span>
                     </a>


                 @endif

                 {{-- @if (Auth::user()) --}}
                 {{-- <span class="sidebar-title list-group-item list-group-item-action py-2 ripple">Form &amp; Berita</span>

                  <a href="" class="list-group-item list-group-item-action py-2 ripple @yield('berita.dashboard')">
                  <i class="fas fa-globe fa-fw me-3"></i>

                  <span>Daftar Berita</span></a>

                  

                  <a href="" class="list-group-item list-group-item-action py-2 ripple @yield('berita.formTambah')">
                  <i class="fas fa-chart-line fa-fw me-3"></i>
                      <span>Tambah Berita</span></a>
                      

              <span class="sidebar-title list-group-item list-group-item-action py-2 ripple">Form &amp; Kategori</span>
          
                  <a href="" class="list-group-item list-group-item-action py-2 ripple @yield('kategori.dashboard')">
                  <i class="fas fa-chart-bar fa-fw me-3"></i>
                      <span>Daftar Kategori</span></a>

                  <a href="" class="list-group-item list-group-item-action py-2 ripple @yield('kategori.formTambah')">
                  <i class="fas fa-chart-line fa-fw me-3"></i>
                      <span>Tambah Kategori</span></a> --}}

                 {{-- @endif --}}
             </div>
         </div>
     </nav>
     <!-- Sidebar -->

     <!-- Navbar -->
     <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
         <!-- Container wrapper -->
         <div class="container-fluid">
             <!-- Toggle button -->
             <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                 aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                 <i class="fas fa-bars"></i>
             </button>

             <!-- Brand -->
             <a class="navbar-brand" href="">
                 {{-- <img src="{{ asset('assets/icon/mitruck.png') }}" height="25" alt="" loading="lazy" /> --}}
             </a>
             <!-- Right links -->
             <ul class="navbar-nav ms-auto d-flex flex-row">
                 <!-- Notification dropdown -->
                 <li class="nav-item dropdown">
                     <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                         role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                         <i class="fas fa-bell"></i>
                         <span class="badge rounded-pill badge-notification bg-danger">1</span>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                         <li><a class="dropdown-item" href="#">Some news</a></li>
                         <li><a class="dropdown-item" href="#">Another news</a></li>
                         <li>
                             <a class="dropdown-item" href="#">Something else</a>
                         </li>
                     </ul>
                 </li>

                 <!-- Icon -->
                 <li class="nav-item">
                     <a class="nav-link me-3 me-lg-0" href="#">
                         <i class="fas fa-fill-drip"></i>
                     </a>
                 </li>
                 <!-- Icon -->
                 <li class="nav-item me-3 me-lg-0">
                     <a class="nav-link" href="https://instagram.com/bima_arifa/">
                         <i class="fab fa-instagram"></i>
                     </a>
                 </li>
                 <li class="nav-item me-3 me-lg-0">
                     <a class="nav-link" href="https://instagram.com/bima_arifa/">
                     </a>
                 </li>

                 <!-- Icon dropdown -->


                 <!-- Avatar -->
                 <li class="nav-item dropdown">

                     <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
                         id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">

                         <img src="{{ asset('assets/icon/'. Auth::user()->avatar) }}" class="rounded-circle img-thumbnail img-fluid" width="32" alt="" loading="lazy" />
                         &nbsp;{{ Auth::user()->name }}&nbsp;
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                         <li><a class="dropdown-item" href="#">Profil</a></li>
                         <li><a class="dropdown-item" href="#">Settings</a></li>

                         <li>

                             @if (Auth::check())
                                 <form method="POST" action="{{ route('logout') }}">
                                     @csrf
                                     <button class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault(); this.closest('form').submit();">Logout</button>
                                 </form>
                             @endif
                         </li>
                     </ul>
                 </li>
             </ul>
         </div>
         <!-- Container wrapper -->
     </nav>
     <!-- Navbar -->
 </header>
 <!--Main Navigation-->
