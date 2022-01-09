@if (Auth::user()->hasRole('feed-manager'))
    <a href="{{ route('checker.akun_saya') }}" class="list-group-item list-group-item-action rounded-6 @yield('akun-saya') mt-3">
        <div class="row">
            <div class="col-2 fa fa-user fs-1"></div>
            <div class="col-1"></div>
            <div class="col-8 align-self-center">
                <span class="fs-6 ">Akun Saya</span>
            </div>
        </div>
    </a>
    <a href="{{ route('checker.pesanan') }}" class="list-group-item list-group-item-action rounded-6 @yield('pesanan') mt-3">
        <div class="row">
            <div class="col-2 fa fa-cart-arrow-down fs-1"></div>
            <div class="col-1"></div>
            <div class="col-8 align-self-center">
                <span class="fs-6 ">Pesanan</span>
            </div>
        </div>
    </a>
@endif