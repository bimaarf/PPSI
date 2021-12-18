@if (Auth::user()->hasRole('admin|super-admin'))
                <a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action rounded-6 @yield('dashboard') mt-3">
                    <div class="row">
                        <div class="col-2 far fa-circle fs-1"></div>
                        <div class="col-1"></div>
                        <div class="col-8 align-self-center">
                            <span class="fs-6 ">Beranda</span>
                        </div>
                    </div>
                </a>
                <a href="{{ route('admin.akun_saya') }}" class="list-group-item list-group-item-action rounded-6 @yield('akun-saya') mt-3">
                    <div class="row">
                        <div class="col-2 far fa-circle fs-1"></div>
                        <div class="col-1"></div>
                        <div class="col-8 align-self-center">
                            <span class="fs-6 ">Akun Saya</span>
                        </div>
                    </div>
                </a>
                <a href="{{ route('admin.add_user') }}" class="list-group-item list-group-item-action rounded-6 @yield('add') mt-3">
                    <div class="row">
                        <div class="col-2 far fa-circle fs-1"></div>
                        <div class="col-1"></div>
                        <div class="col-8 align-self-center">
                            <span class="fs-6 ">Registrasi Admin</span>
                        </div>
                    </div>
                </a>
                <a href="{{ route('admin.table_admin') }}" class="list-group-item list-group-item-action rounded-6 @yield('daftar-admin') mt-3">
                    <div class="row">
                        <div class="col-2 far fa-circle fs-1"></div>
                        <div class="col-1"></div>
                        <div class="col-8 align-self-center">
                            <span class="fs-6 ">Daftar Admin</span>
                        </div>
                    </div>
                </a>
                <a href="{{ route('admin.table_driver') }}" class="list-group-item list-group-item-action rounded-6 @yield('daftar-driver') mt-3">
                    <div class="row">
                        <div class="col-2 far fa-circle fs-1"></div>
                        <div class="col-1"></div>
                        <div class="col-8 align-self-center">
                            <span class="fs-6 ">Daftar Driver</span>
                        </div>
                    </div>
                </a>
                <a href="{{ route('admin.table_shipper') }}" class="list-group-item list-group-item-action rounded-6 @yield('daftar-shipper') mt-3">
                    <div class="row">
                        <div class="col-2 far fa-circle fs-1"></div>
                        <div class="col-1"></div>
                        <div class="col-8 align-self-center">
                            <span class="fs-6 ">Daftar Shipper</span>
                        </div>
                    </div>
                </a>
                <a href="{{ route('admin.berita.index') }}" class="list-group-item list-group-item-action rounded-6 @yield('daftar-berita') mt-3">
                    <div class="row">
                        <div class="col-2 far fa-circle fs-1"></div>
                        <div class="col-1"></div>
                        <div class="col-8 align-self-center">
                            <span class="fs-6 ">Daftar Berita</span>
                        </div>
                    </div>
                </a>
                @endif