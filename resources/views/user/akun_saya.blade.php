@extends('layouts.backend.main_login')
@section('akun-saya', 'active')
@section('content')

<div class="card shadow-none">
    <div class="p-4 card-header">
        <div class="float-left">

            <h4 class="text-capitalize fw-bold text-dark">Profil Kamu</h4>
        </div>
        <div class="float-right">
            <a href="#" onclick="sunting()" id="sunting" class="btn btn-outline-info fw-bold text-capitalize">
                Perbarui Profil</a>
            <a href="#" onclick="batal()" id="backs" class="btn btn-outline-info fw-bold d-none text-capitalize">
                Batal</a>
        </div>
    </div>
    @include('akun.sunting')
    <div class="card-body " id="body">
        <h5 class="text-dark">Jenis Akun</h5>
        <p class="text-black-100 ml-4 text-capitalize">Shipper</p>
        <h5 class="text-dark">Nama Lengkap</h5>
        <p class="text-black-100 ml-4 text-capitalize">{{ Auth::user()->name }}</p>
        <h5 class="text-dark">Nomor Handphone</h5>
        <p class="text-black-100 ml-4 text-capitalize">+62{{ Auth::user()->telp }}</p>
        <h5 class="text-dark">Email</h5>
        <p class="text-black-100 ml-4">{{ Auth::user()->email }}</p>
        <h5 class="text-dark">Alamat</h5>
        <p class="text-black-100 ml-4 text-capitalize">{{ Auth::user()->alamat }}</p>
        <h5 class="text-dark">Status</h5>
        <p class="text-black-100 ml-4 text-capitalize">{{ Auth::user()->status->status }}</p>
        
    </div>
</div>

@endsection
<script>
    function sunting() {
        $('#body').addClass('d-none');
        $('#form').removeClass('d-none');
        $('#sunting').addClass('d-none');
        $('#backs').removeClass('d-none');
    }
    function batal() {
        $('#body').removeClass('d-none');
        $('#form').addClass('d-none');
        $('#backs').addClass('d-none');
        $('#sunting').removeClass('d-none');
    }

</script>