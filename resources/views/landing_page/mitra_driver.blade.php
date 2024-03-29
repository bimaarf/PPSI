@extends('landing_page.main')
@section('mitra-driver', 'active')

@section('content')

    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">
        <div class="hero-container">
            <div class="hero-image">
                <img src="assets/img/pexels-markus-spiske-172074.jpg" alt="">
            </div>
            <div class="hero-text" id="other-hero">
                <h1>Cari Penghasilan<br>Bersama Mitruck</h1>
                <p>Dapatkan penghasilan <br> dengan menjadi mitra kami</p>
            </div>
        </div>
    </div>
    <!-- ***** Welcome Area End ***** -->
<!-- ***** Power Section Start ***** -->
<div class="power-section landing-section">
    <div class="power-header">
        <p>bekerja bersama Mitruck</p>
        <h2 class="title">Lebih Mudah, Efisien, dan Aman</h2>
    </div>
    <div class="power-content">
        <div class="power-image">
            <img src="assets/img/pexels-tima-miroshnichenko-6169670.jpg" alt="power image">
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
                    <p>Selalu memastikan driver dan kendaraan dengan performa baik, dan dengan i asuransi menjadi lebih tenang</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Power Section End ***** -->

<!-- ***** How Works Start ***** -->
<div class="how-works landing-section">
    <div class="how-works-title title">
        <h1>Yang Diperlukan Untuk Menjadi Driver Mitruck</h1>
    </div>
    <div class="power-content be-driver">
        <div class="be-driver-image">
            <img src="assets/img/smartphone.png" alt="power image">
            <h2>Smarthphone</h2>
            <p>Sebuah perangkat untuk menghubungkan kamu dengan mitruck</p>
        </div>
        <div class="be-driver-image">
            <img src="assets/img/driving-license.png" alt="power image">
            <h2>Kartu Identitas</h2>
            <p>Sebuah perangkat untuk menghubungkan kamu dengan mitruck</p>
        </div>
    </div>
    <button type="submit" class="kontak-info-btn">Daftar Sekarang</button>
</div>
<!-- ***** How Works End ***** -->

<!-- ***** Break Point Start ***** -->
<div class="break">
    <div class="break-title title">
        <h2>Dukungan Armada Terbaik <br> Solusi Bisnis Anda</h2>
    </div>
    <div class="break-content">
        <div>
            <h1>
                <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1" class="purecounter">
                </span>
            </h1>
            <p>Armada & Driver</p>
        </div>
        <div>
            <h1>
                <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="1" class="purecounter">
                </span>
            </h1>
            <p>Jangkauan Kota</p>
        </div>
    </div>
</div>
<!-- ***** Break Point End ***** -->

<!-- ***** FAQ Start ***** -->
<div class="landing-section">
    <div class="power-header">
        <h2 class="title">frequntly asked question</h2>
    </div>
    <div class="power-content">
        <div class="power-image other-power-image">
            <img src="assets/img/customer-service.png" alt="power image">
        </div>
        <div class="power-text other-power-text">
            <div class="power faq">
                <div class="faq-q">
                    <h3>Question 1 ?</h3>
                    <i class="fas fa-chevron-left" id="drop-icon"></i>
                </div>
                <div class="faq-a">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur quaerat asperiores minus iusto laudantium reiciendis dolorem modi maiores, velit nisi, saepe maxime, suscipit quidem! Nostrum placeat molestiae neque beatae dolorem.</p>
                </div>
            </div>
            <div class="power faq">
                <div class="faq-q">
                    <h3>Is this question 2</h3>
                    <i class="fas fa-chevron-left" id="drop-icon"></i>
                </div>
                <div class="faq-a">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit sapiente est necessitatibus expedita mollitia minus provident dolores nihil consequuntur sunt?</p>
                </div>
            </div>
            <div class="power faq">
                <div class="faq-q">
                    <h3>What happen with question number 3?</h3>
                    <i class="fas fa-chevron-left" id="drop-icon"></i>
                </div>
                <div class="faq-a">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias sequi praesentium saepe consequuntur nostrum quidem!</p>
                </div>
            </div>
            <div class="power faq">
                <div class="faq-q">
                    <h3>This is Question number 4</h3>
                    <i class="fas fa-chevron-left" id="drop-icon"></i>
                </div>
                <div class="faq-a">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio, consequuntur.</p>
                </div>
            </div>
            <div class="power faq">
                <div class="faq-q">
                    <h3>Question number 4</h3>
                    <i class="fas fa-chevron-left" id="drop-icon"></i>
                </div>
                <div class="faq-a">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio, consequuntur.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** FAQ End ***** -->

@endsection