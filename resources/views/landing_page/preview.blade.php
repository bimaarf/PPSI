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
            <h1 style="text-align: center">{{ $berita->title }}</h1>
        </div>
        <div class="new-news-content swiper">
            <div class="swiper-wrapper">
                <div class="new-news-content-item swiper-slide"style=" display: block">
                    <img src="{{ asset('storage/berita/' . $berita->image) }}" alt="" style="width: 600px; display: block;
                    margin-left: auto;
                    margin-right: auto;
                    width: 50%;">
                    <div class="new-news-main"style=" align:left">
                      
                        <div class="new-news-main-date" style="text-align: left">
                            <h5>{{ $berita->created_at }}</h5>
                        </div>
                        <div class="new-news-main-content" style="text-align: left">
                            <p>{!! $berita->body !!}</p>
                        </div>

                    </div>
                </div>

            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
@endsection
