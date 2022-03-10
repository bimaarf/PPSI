@extends('landing_page.main')
@section('contact', 'active')
    
@section('content')
    
    <!-- ***** Banner Blog Area Start ***** -->
    <div class="banner">
        <h1>Hubungi Kami</h1>
        <i class="fas fa-address-book fa-10x"></i>
    </div>
    <!-- ***** Banner Blog Area End ***** -->
    
    <!-- ***** Contact Start *****  -->
    <div class="new-news contact" id="contact">

        <h1 class="new-news-title contact-title title"> <span>hubungi</span> kami </h1>

        <div class="contact-main">

            <iframe class="contact-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d997.4541400135955!2d109.3108287291626!3d-0.053821158893136864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d596b3f63eacd%3A0xfef74378a93abccb!2sJl.%20Pak%20Benceng%20No.4%2C%20Sungai%20Bangkong%2C%20Kec.%20Pontianak%20Sel.%2C%20Kota%20Pontianak%2C%20Kalimantan%20Barat%2078113!5e0!3m2!1sen!2sid!4v1640657050579!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

            <form action="" class="contact-form">
                <h2 class="title">Hubungi Kami</h2>
                <input type="text" placeholder="nama" class="contact-input">
                <input type="email" placeholder="email" class="contact-input">
                <input type="number" placeholder="telp" class="contact-input">
                <textarea name="pesan" id="contact-pesan"  rows="5" class="contact-input"></textarea>
                <input type="submit" value="Hubungi Sekarang" class="btn-contact contact-input">
            </form>

        </div>

    </div>

    <!-- contact section ends -->

    <!-- ***** Join Flag Start ***** -->
    <div class="join-flag">
        <div class="join-flag-card">
            <h3>Mari, Order Sekarang</h3>
            <p>Pesan driver untuk pengiriman barang anda</p>
            <div class="flag-btn">
                <a href="#">Order Sekarang</a>
            </div>
        </div>
    </div>
    <!-- ***** Join Flag End ***** -->

@endsection