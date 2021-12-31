@extends('layouts.backend.main_login')
@section('akun-saya', 'active')
@section('content')

<div class="card rounded d-xs-none d-lg-block d-md-none collapse">
    <div class="card-body">
        <div class="fs-5 ">
            <em class="fas fa-home text-primary"></em>&emsp;<strong>Beranda</strong>
        </div>
    </div>
</div>
<div class="card mt-4">
    <div class="card-header">
        <h4 class="text-capitalize float-left text-dark">Profil Kamu</h4>
        <a href="#" onclick="sunting()" id="sunting" class="float-right btn btn-info text-capitalize"><i class="fas fa-pen-alt"></i>&ensp;
            Sunting Profil</a>
    </div>
    @include('akun.sunting')
    <div class="card-body " id="body">
        <h5 class="text-dark">Jenis Akun</h5>
        <p class="text-black-100 ml-4 text-capitalize">
            @role('driver')Driver @endrole
            @role('shipper')Shipper @endrole
        </p>
        <h5 class="text-dark">Nama Lengkap</h5>
        <p class="text-black-100 ml-4 text-capitalize">{{ Auth::user()->name }}</p>
        <h5 class="text-dark">Nomor Handphone</h5>
        <p class="text-black-100 ml-4 text-capitalize">+62{{ Auth::user()->telp }}</p>
        <h5 class="text-dark">Email</h5>
        <p class="text-black-100 ml-4">{{ Auth::user()->email }}</p>
        <h5 class="text-dark">Jalur / Rute</h5>
        
        <h5 class="text-dark">Alamat</h5>
        <p class="text-black-100 ml-4 text-capitalize">{{ Auth::user()->alamat }}</p>
        <h5 class="text-dark">Status</h5>
        <p class="text-black-100 ml-4 text-capitalize">{{ Auth::user()->status->status }}</p>
        
    </div>
</div>

@endsection
<script>
    var condition = true;
    function sunting(){
        if(condition == true){
            document.getElementById('form').style.display = 'block';
            document.getElementById('body').style.display = 'none';
            condition = false;
            
        }else if(condition == false){
            document.getElementById('form').style.display = 'none';
            document.getElementById('body').style.display = 'block';
            condition = true;
        }
        console.log(condition);
  
    }
</script>