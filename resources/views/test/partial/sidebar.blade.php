<aside class="menu">
    <div class="identitas">
        <div class="foto-identitas">
            <img src="{{ asset("assets/img/landing/shipper.png") }}" alt="">
        </div>
        <span class="nama-identitas nama">
            {{ Auth::user()->name }}
        </span>
    </div>
    <ul class="sidebar">
        <li class="sidelink {{ Route::is('profile') ? 'active' : ''}}">
            <a href="{{ route('profile') }}" class="nav-side">
                <i class="fas fa-user"></i>
                <span>Akun Saya</span>
            </a>
        </li>
        <li class="sidelink {{ Route::is('inbox') ? 'active' : ''}}">
            <a href="{{ route('inbox') }}" class="nav-side">
                <i class="fas fa-envelope"></i>
                <span>Kotak Masuk</span>
            </a>
        </li>
        <li class="sidelink">
            <a href="#" class="nav-side">
                <i class="fas fa-shipping-fast"></i>
                <span>Pesanan</span>
            </a>
        </li>
        <li class="sidelink logout">
            <form action="{{ route('logout') }}" method="post" class="nav-side">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </button>
            </form>
        </li>
    </ul>
</aside>