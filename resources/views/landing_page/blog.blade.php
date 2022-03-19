@extends('landing_page.main')
@section('content')
    

    <!-- ***** Banner Blog Area Start ***** -->
    <div class="banner">
        <h1>Blog</h1>
        <i class="fas fa-newspaper fa-10x"></i>
    </div>
    <!-- ***** Banner Blog Area End ***** -->
    
    <!-- ***** New News Start ***** -->
    <div class="new-news">
        <div class="new-news-title title">
            <h1>Berita Terbaru</h1>
        </div>
        <div class="new-news-content swiper">
            <div class="swiper-wrapper">
                <div class="new-news-content-item swiper-slide">
                    <div class="new-news-image" style="background-image: url(assets/img/pexels-markus-spiske-172074.jpg);">
                    </div>
                    <div class="new-news-main">
                        <div class="new-news-main-title">
                            <h2>Antar barang sampai puas</h2>
                        </div>
                        <div class="new-news-main-date">
                            <h5>6 Desember 2021</h5>
                        </div>
                        <div class="new-news-main-content">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita vitae earum voluptate, corrupti voluptates tempore veritatis quos, vel perspiciatis aspernatur tenetur sint nesciunt, asperiores unde! Odit adipisci hic laborum delectus?...</p>
                        </div>
                        <div class="new-news-next">
                            <a href="#">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="new-news-content-item swiper-slide">
                    <div class="new-news-image" style="background-image: url(assets/img/pexels-rodnae-productions-7363102.jpg);">
                    </div>
                    <div class="new-news-main">
                        <div class="new-news-main-title">
                            <h2>Antar barang sampai puas</h2>
                        </div>
                        <div class="new-news-main-date">
                            <h5>6 Desember 2021</h5>
                        </div>
                        <div class="new-news-main-content">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita vitae earum voluptate, corrupti voluptates tempore veritatis quos, vel perspiciatis aspernatur tenetur sint nesciunt, asperiores unde! Odit adipisci hic laborum delectus?...</p>
                        </div>
                        <div class="new-news-next">
                            <a href="#">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- ***** New News End ***** -->
    
    <!-- ***** All News Start ***** -->
    <div class="new-news all-news">
        <div class="new-news-title all-news-title title">
            <h1>Semua Berita</h1>
        </div>
        <div class="all-news-content">
            @foreach ($berita as $berita)
                
            <div class="all-news-item">
                <div class="all-news-main">
                    <div class="all-news-image">
                        <img src="{{ asset('storage/berita/' . $berita->image) }}" alt="" style="  object-fit: none; /* Do not scale the image */
                        object-position: center; /* Center the image within the element */
                        height: 300px;
                        width: 100%;">
                    </div>
                    <div class="all-news-main-title">
                        <h3>{{ $berita->title }}</h3>
                    </div>
                    <div class="all-news-date">
                        <h5>
                            {{ $berita->created_at }}
                        </h5>
                    </div>
                </div>
                <div class="all-news-next">
                    <a href="{{ route('landing_page.preview', ['slug' => $berita->slug]) }}">
                        Baca Selanjutnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="new-news-next every-news-butt">
            <a href="#">
                Tampilkn Semua
            </a>
        </div>
    </div>
    <!-- ***** All News End ***** -->

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