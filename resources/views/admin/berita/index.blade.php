@extends('admin.main')
@section('daftar-berita', 'active')
@section('content')
    <div class="card rounded d-xs-none d-lg-block d-md-none collapse">
        <div class="card-body">
            <div class="fs-5">
                <i class="fas fa-home text-primary"></i>&emsp;<b>Beranda&emsp;/&emsp;Daftar Berita</b>
                <a href="#" onclick="pageChange()" id="page-change" class="float-right btn btn-info text-capitalize"><i
                        class="fas fa-plus"></i>&ensp;
                    Tambah</a>
            </div>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-3 col-lg-8 mt-2">
            <a href="#" onclick="pageChange()" id="page-change" class="btn btn-danger text-capitalize d-lg-none" style=" height: 40px;"><i
                class="fas fa-plus pt-2"></i></a>
        </div>
        
        <div class="col-9 col-lg-4 mt-2">
            <form id="search" class="input-group btn-group w-100 my-auto" action="{{ route('admin.berita.index') }}">
                <input type="text" value="{{ request('title') }}" class="form-control" name="title"
                    placeholder='Cari judul' style="width: 200px; height: 40px;">

                <button class="btn bg-info text-white" type="submit"><i class="fas fa-search"></i></button>
            </form>
            
        </div>
    </div>
    <div id="form-berita" class="d-none">
        @include('admin.form_berita')
    </div>
    @if (count($berita) < 1)
        <marquee class="container">Berita yg anda cari tidak ada!</marquee>
    @endif
    <div id="berita">
        <div class="row">
            @foreach ($berita as $berita)
                <div class="col-lg-3 col-6 mt-2">
                    <img src="{{ asset('storage/berita/' . $berita->image) }}" class="card-img-top img-fluid rounded-6"
                        alt="Sunset Over the Sea"
                        style="height: 150px; object-position: center;overflow: hidden;object-fit: cover;" />

                    <div class="card rounded-6 mt-n4">
                        <div class="card-body">
                            <input class="border-bottom border-0 border-success mx-4 my-1" type="hidden" value="1"
                                name="jumlah" id="jumlah">
                            <a href="/admin/berita/post/{{ $berita->slug }}/edit"><i class="fa fa-pen-alt text-success position-absolute"
                                    style="right: 10px; top: 10px"></i></a>

                            <a href="{{ route('admin.berita.detail', ['slug' => $berita->slug]) }}">

                                <p class="card-text text-title mt-n3 text-success fw-bold small">
                                    {{ Str::limit($berita->title, 50) }}
                                </p>
                                <div class="card-text text-black-50 small mt-n3 fw-bold">
                                    <i class="fa fa-user"></i>
                                    {{ $berita->user->name }}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>

@endsection
<script>
    var condition = true;

    function pageChange() {
        if (condition == true) {
            $('#form-berita').removeClass('d-none');
            $('#search').addClass('d-none');
            $('#berita').addClass('d-none');
            condition = false;

        } else if (condition == false) {
            $('#form-berita').addClass('d-none');
            $('#search').removeClass('d-none');
            $('#berita').removeClass('d-none');
            condition = true;
        }

    }
</script>
