@extends('landing_page.main')
@section('content')
    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">
        <div class="hero-container">
            <div class="hero-image">
                <img src="assets/img/mt_bg.png" alt="">
            </div>
            <div class="hero-text">
                <h1>Just meet your truck, <br> and load! </h1>
            </div>
        </div>
    </div>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Shipper Driver Card Start ***** -->
    <div class="sdcards-container">
        <div class="sdcard">
            <img src="assets/img/shipper.png" alt="shipper" class="sd-image">
            <div class="sd-text">
                <h3>Shipper</h3>
                <p>Ayo, kirim barang anda disini.</p>
            </div>
            <div class="sd-link">
                <a href="#" class="sd-link">Lebih Lanjut</a>
            </div>
        </div>
        <div class="sdcard">
            <img src="assets/img/driver.png" alt="driver" class="sd-image">
            <div class="sd-text">
                <h3>Driver</h3>
                <p>Mari bergabung dan dapatkan order.</p>
            </div>
            <div class="sd-link">
                <a href="#" class="sd-link">Lebih Lanjut</a>
            </div>
        </div>
    </div>
    <!-- ***** Shipper Driver Card End ***** -->

    <!-- ***** Power Section Start ***** -->
    <div class="power-section landing-section">
        <div class="power-header">
            <p>kirim di mitruck</p>
            <h2 class="title">Lebih Mudah, Efisien, dan Aman</h2>
        </div>
        <div class="power-content">
            <div class="power-image">
                <img src="assets/img/f1.jpg" alt="power image">
            </div>
            <div class="power-text">
                <div class="power">
                    <img src="assets/img/mudah.png" alt="lebih mudah" width="48px">
                    <div>
                        <h3>Lebih Mudah</h3>
                        <p>Cukup daftar melalui website ini, dan dapatkan armada dengan instan</p>
                    </div>
                </div>
                <div class="power">
                    <img src="assets/img/efisien.png" alt="efisien" width="48px">
                    <div>
                        <h3>Efisien</h3>
                        <p>Tarif transparan langsung dari driver dengan bayar tunai maupun transfer</p>
                    </div>
                </div>
                <div class="power">
                    <img src="assets/img/aman.png" alt="lebih mudah" width="48px">
                    <div>
                        <h3>Aman</h3>
                        <p>Selalu memastikan driver dan kendaraan dengan performa baik, dan dengan i asuransi menjadi lebih
                            tenang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Power Section End ***** -->

    <!-- ***** Break Point Start ***** -->
    <div class="break">
        <div class="break-title title">
            <h2>Dukungan Armada Terbaik <br> Solusi Bisnis Anda</h2>
        </div>
        <div class="break-content">
            <div>
                <h1>
                    <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1"
                        class="purecounter">
                    </span>
                </h1>
                <p>Armada & Driver</p>
            </div>
            <div>
                <h1>
                    <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="1"
                        class="purecounter">
                    </span>
                </h1>
                <p>Jangkauan Kota</p>
            </div>
        </div>
    </div>
    <!-- ***** Break Point End ***** -->

    <!-- ***** Armada Area Start ***** -->
    <div id="armada" class="armada landing-section">
        <div class="armada-title title">
            <h2>Pilih sendiri armada yang kamu inginkan</h2>
        </div>
        <div class="armada-content">
            <div class="armada-item">
                <img src="assets/img/blindvan.jpg" class="" alt="Foto1">
            </div>
            <div class="armada-item">
                <img src="assets/img/cdd_bak.jpg" class="" alt="Foto2">
            </div>
            <div class="armada-item">
                <img src="assets/img/cdd_box.jpg" class="" alt="Foto3">
            </div>
            <div class="armada-item">
                <img src="assets/img/cdd_reefer.jpg" class="" alt="Foto4">
            </div>
            <div class="armada-item">
                <img src="assets/img/pickup.jpg" class="" alt="Foto5">
            </div>
            <div class="armada-item">
                <img src="assets/img/armada.jpg" class="" alt="Foto5">
            </div>
        </div>
    </div>
    <!-- ***** Armada Area End ***** -->

    <!-- ***** Kontak Info Start ***** -->
    <div class="kontak-info landing-section">
        <h2 class="kontak-info-title title">Sebagai solusi korporasi <br>& info lainnya.</h2>
        <button type="submit" class="kontak-info-btn">Kontak Segera</button>
    </div>
    <!-- ***** Kontak Info End ***** -->
@endsection
