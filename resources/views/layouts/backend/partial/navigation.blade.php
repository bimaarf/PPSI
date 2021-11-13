 <!--Main Navigation-->
 <header>
     
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
                 <img src="{{ asset('assets/icon/mitruck.png') }}" height="25" alt="" loading="lazy" />
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
