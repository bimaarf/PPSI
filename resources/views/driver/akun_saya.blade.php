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
        <div class="row">
            <div class="col-lg-7">
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
                @if ($ruteCount > 0)
                <span class="text-danger d-lg-none d-sm-block float-right" data-mdb-toggle="modal" data-mdb-target="#jalur">Tambah Rute ?</span>
                    @foreach (json_decode($driverJalur->rute) as $jalur)
                    
                    <p class="text-black-100 ml-4 text-capitalize">-&nbsp;{{ $jalur }}</p>
                    @endforeach
                    @else
                    <p class="ml-4" data-mdb-toggle="modal" data-mdb-target="#jalur"><a href="#" class="pe-auto text-danger">Anda belum menambahkan jalur/rute! </a></p>
                @endif
            </div>
            <div class="col-lg-5 d-lg-block d-xm-none collapse">
                <a href="#" class="btn btn-success float-right rounded-pill text-capitalize" data-mdb-toggle="modal" data-mdb-target="#jalur">Tambah Armada / Jalur</a>
                <br><br>
                @foreach ($driverArmada as $armada)
                <div class="row p-2 rounded-pill border mt-2" style="width: 80%">
                    <div class="col-3">
                        <i class="fas fa-shipping-fast text-info float-left" style="font-size: 45px;"></i>
                    </div>
                    <div class="col-9 text-start">
                        <h6>{{ $armada->armada->name }}</h6>
                        <small>Armada Anda</small>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <h5 class="text-dark">Alamat</h5>
        <p class="text-black-100 ml-4 text-capitalize">{{ Auth::user()->alamat }}</p>
        <h5 class="text-dark">Status</h5>
        <p class="text-black-100 ml-4 text-capitalize">{{ Auth::user()->status->status }}</p>
        
    </div>
</div>

@include('driver.modal.modal_jalur')

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
 
    function pesanan()
    {
        const url = "/driver/pesanan"
        $.get(url, {}, function() {
            const query= "#body" 
            // console.log(query);
            $(query).html(url);
           
        });
    }
</script>