@extends('layouts.backend.main_login')
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
    <a href="#" onclick="pageChange()" id="page-change" class="btn btn-info text-capitalize my-2 d-lg-none"><i
            class="fas fa-plus"></i>&ensp;
        Tambah</a>
    <div id="form-berita" class="d-none">
        @include('admin.form_berita')
    </div>
    <div id="berita">
        <div class="row">
            @foreach ($berita as $berita)
                <div class="col-lg-3 col-6 mt-2">
                    <img src="{{ asset('storage/berita/'. $berita->image) }}"
                        class="card-img-top img-fluid rounded-6" alt="Sunset Over the Sea"
                        style="height: 100px; object-position: center;overflow: hidden;object-fit: cover;" />

                    <div class="card rounded-6 mt-n4">
                        <div class="card-body">
                            <input class="border-bottom border-0 border-success mx-4 my-1" type="hidden" value="1"
                                name="jumlah" id="jumlah">
                            <a href="#add"><i class="fa fa-pen-alt text-success position-absolute"
                                    style="right: 10px; top: 10px"></i></a>

                            <a href="{{ route('admin.berita.detail', ['slug'=>$berita->slug]) }}">

                                <p class="card-text text-title mt-n3 text-success fw-bold small">
                                    {{ Str::limit($berita->title, 50) }}
                                </p>
                                <div class="card-text text-black-50 small mt-n3 fw-bold">
                                    <i class="fa fa-user"></i>
                                    {{ $berita->user->name }}
                                </div>
                            </a>
                            <div class="mt-n1" id="stars" onclick="stars">
                            </div>
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
            $('#berita').addClass('d-none');
            condition = false;

        } else if (condition == false) {
            $('#form-berita').addClass('d-none');
            $('#berita').removeClass('d-none');
            condition = true;
        }

    }
</script>
