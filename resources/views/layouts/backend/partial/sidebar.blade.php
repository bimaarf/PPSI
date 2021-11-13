<nav id="sidebarMenu" class="d-lg-block collapse" style="z-index: 9">
    <!-- Search form -->
   <div class="card" style="border-top-left-radius: 50px; border-bottom-left-radius: 50px; height:100%;">
    <div class="position-sticky">
        <div class="list-group list-group-flush pt-4 mx-4">
            <div class="row">
                <div class="col-3">
                    <img src="{{ asset('assets/backend/icon/Shipper.svg') }}" class="img-thumbnail rounded-circle" alt="">
                </div>
                <div class="col-9 align-self-center">
                    <h4 class="text-capitalize text-black-100">{{ Auth::user()->name }}</h4>
                </div>
            </div>
            <hr>
            @if (Auth::user()->hasRole('admin|super-admin'))
            <a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action rounded-6 @yield('dashboard') mt-3">
                <div class="row">
                    <div class="col-2">
                        <i class="far fa-circle fs-1" ></i>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-8 align-self-center">
                        <span class="fs-6 ">Beranda</span>
                    </div>
                </div>
            </a>
            <a href="{{ route('admin.akun_saya') }}" class="list-group-item list-group-item-action rounded-6 @yield('akun-saya') mt-3">
                <div class="row">
                    <div class="col-2">
                        <i class="far fa-circle fs-1" ></i>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-8 align-self-center">
                        <span class="fs-6 ">Akun Saya</span>
                    </div>
                </div>
            </a>
            <a href="{{ route('admin.add_user') }}" class="list-group-item list-group-item-action rounded-6 @yield('add') mt-3">
                <div class="row">
                    <div class="col-2">
                        <i class="far fa-circle fs-1" ></i>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-8 align-self-center">
                        <span class="fs-6 ">Registrasi Admin</span>
                    </div>
                </div>
            </a>
            <a href="{{ route('admin.table_admin') }}" class="list-group-item list-group-item-action rounded-6 @yield('daftar-admin') mt-3">
                <div class="row">
                    <div class="col-2">
                        <i class="far fa-circle fs-1" ></i>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-8 align-self-center">
                        <span class="fs-6 ">Daftar Admin</span>
                    </div>
                </div>
            </a>
            <a href="{{ route('admin.table_driver') }}" class="list-group-item list-group-item-action rounded-6 @yield('daftar-driver') mt-3">
                <div class="row">
                    <div class="col-2">
                        <i class="far fa-circle fs-1" ></i>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-8 align-self-center">
                        <span class="fs-6 ">Daftar Driver</span>
                    </div>
                </div>
            </a>
            <a href="{{ route('admin.table_shipper') }}" class="list-group-item list-group-item-action rounded-6 @yield('daftar-shipper') mt-3">
                <div class="row">
                    <div class="col-2">
                        <i class="far fa-circle fs-1" ></i>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-8 align-self-center">
                        <span class="fs-6 ">Daftar Shipper</span>
                    </div>
                </div>
            </a>
            @endif
            @if (Auth::user()->hasRole('driver'))
            <a href="{{ route('driver.index') }}" class="list-group-item list-group-item-action rounded-6 @yield('akun-saya') mt-3">
                <div class="row">
                    <div class="col-2">
                        <i class="far fa-circle fs-1" ></i>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-8 align-self-center">
                        <span class="fs-6 ">Akun Saya</span>
                    </div>
                </div>
            </a>
            <a href="{{ route('driver.pesanan_masuk') }}" class="list-group-item list-group-item-action rounded-6 @yield('pesanan_anda') mt-3">
                <div class="row">
                    <div class="col-2">
                        <i class="far fa-circle fs-1" ></i>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-8 align-self-center">
                        <span class="fs-6 ">Pesanan Masuk</span>
                    </div>
                </div>
            </a>
            @endif
            @if (Auth::user()->hasRole('shipper'))
            <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action rounded-6 @yield('akun-saya') mt-3">
                <div class="row">
                    <div class="col-2">
                        <i class="far fa-circle fs-1" ></i>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-8 align-self-center">
                        <span class="fs-6 ">Akun Saya</span>
                    </div>
                </div>
            </a>
            <a href="{{ route('user.pesanan_anda') }}" class="list-group-item list-group-item-action rounded-6 @yield('pesanan_anda') mt-3">
                <div class="row">
                    <div class="col-2">
                        <i class="far fa-circle fs-1" ></i>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-8 align-self-center">
                        <span class="fs-6 ">Pesanan Saya</span>
                    </div>
                </div>
            </a>
            @endif
           
            @if (Auth::check())
            <form method="POST" action="{{ route('logout') }}" class="mb-4 position-relative">
                @csrf
            <a href="{{ route('logout') }}" class="list-group-item list-group-item-action rounded-6 mt-3 btn btn-danger" onclick="event.preventDefault(); this.closest('form').submit();">
                <div class="row">
                    <div class="col-2">
                        <i class="fas fa-circle fs-1" ></i>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-8 align-self-center">
                        <span class="fs-6 text-capitalize">Keluar</span>
                    </div>
                </div>
            </a>
        </form>
        @endif
        </div>
    </div>
   </div>
</nav>