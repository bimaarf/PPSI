@extends('layouts.backend.main_login')
@section('akun-saya', 'active')
@section('content')

<div class="card rounded">
    <div class="card-body">
        <div class="fs-5">
            <i class="fas fa-home text-primary"></i>&emsp;<b>Beranda</b>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-lg-5">
        <div class="card rounded-9">
            <div class="text-center">
                <img src="{{ asset('assets/icon/Driver.svg') }}" class="img-fluid rounded mt-4" width="200vh"
                    alt="">
                <h4 class="text-capitalize text-dark mt-4"><b>{{ Auth::user()->name }}</b></h4>
                <h5 class="text-lowercase text-dark">{{ Auth::user()->email }}</h5>
                <form action="">
                    <h6 >Ubah Password</h6>
                    <div class="form-group">
                        <input class="inp" placeholder="Password baru" />
                    </div>
                    <div class="form-group">
                        <input class="inp" placeholder="Konfirmasi password" />
                    </div>
                    <div class="mt-4 mb-4">
                        <input class="btn btn-success" type="submit" value="Ubah Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card rounded-9">
            <div class="card-header">
                <h4 class="text-capitalize text-center text-dark mt-4">Profil Kamu</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <h5 class="text-dark">Nama Lengkap</h5>
                        <h5 class="text-dark">Email</h5>
                        <h5 class="text-dark">Nomor HP</h5>
                        <h5 class="text-dark">Status</h5>
                        <h5 class="text-dark">Alamat</h5>
                    </div>
                    <div class="col-1">
                        <h5>:</h5>
                        <h5>:</h5>
                        <h5>:</h5>
                        <h5>:</h5>
                        <h5>:</h5>
                    </div>
                    <div class="col-6">
                        <h5 class="text-black-50">{{ Auth::user()->name }}</h5>
                        <h5 class="text-black-50">{{ Auth::user()->email }}</h5>
                        <h5 class="text-black-50">{{ Auth::user()->telp }}</h5>
                        <h5 class="text-black-50">{{ Auth::user()->status->status }}</h5>
                        <h5 class="text-black-50">{{ Auth::user()->alamat }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="card rounded-9 mt-2">
            <div class="card-header">
                <h4 class="text-dark text-capitalize text-center">Jenis Akun</h4>
            </div>
            <div class="card-body">
               <div class="row">
                   <div class="col-lg-6">
                    <h5 class="text-dark fa-pull-left">Driver</h5>
                    
                   </div>
                   <div class="col-lg-6">
                    @if (Auth::user()->status_id == 1)
                        <a href="#" class="btn btn-success rounded-pill text-capitalize">Terverifikasi</a>
                    @endif
                    @if (Auth::user()->status_id == 2)
                        <a href="#" class="btn btn-danger rounded-pill text-capitalize">Non Aktif</a>
                    @endif
                    @if (Auth::user()->status_id == 3)
                        <a href="#" class="btn btn-warning rounded-pill text-capitalize">Sedang dalam orderan</a>
                    @endif
                   </div>
                   {{-- jalur --}}
                   <div class="col-lg-6 mt-4"><h5 class="text-dark">Jalur</h5></div>
                   <div class="col-lg-6 mt-4">
                       <a href="#" class="btn btn-info rounded-pill text-capitalize" data-mdb-toggle="modal" data-mdb-target="#jalur">Tambahkan Jalur</a>
                   </div>
               </div>
            </div>
        </div>
    </div>
</div>
@include('driver.modal.modal_jalur')

@endsection
