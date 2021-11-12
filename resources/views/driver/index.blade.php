@extends('layouts.backend.main_login')
@section('akun-saya', 'active')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success text-center">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif
<div class="row">
    <div class="col-lg-3 mt-2">
        <div class="card bg-primary">
            <div class="card-header">
                <img class="fa-pull-right" src="{{ asset('assets/icon/Driver.svg') }}" width="50" alt="">
                <div class="float-start">
                    <h2 class="text-white"><i class="fa fa-users"></i>&emsp;{{ $tDriver }}</h2>
                    <h6 class="text-white-50">Driver terdaftar</h6>
                </div>
            </div>
            <div class="card-body"><i class="text-white-50 fa fa-clock"></i>
                <span class="text-white-50">Updated</span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 mt-2">
        <div class="card bg-success">
            <div class="card-header">
                <img class="fa-pull-right" src="{{ asset('assets/icon/Shipper.svg') }}" width="50" alt="">
                <div class="float-start">
                    <h2 class="text-white"><i class="fa fa-users"></i>&emsp;{{ $tShipper }}</h2>
                    <h6 class="text-white-50">Shipper terdaftar</h6>
                </div>
            </div>
            <div class="card-body"><i class="text-white-50 fa fa-clock"></i>
                <span class="text-white-50">Updated</span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 mt-2">
        <div class="card bg-secondary">
            <div class="card-header">
                <img class="fa-pull-right" src="{{ asset('assets/icon/Driver.svg') }}" width="50" alt="">
                <div class="float-start">
                    <h2 class="text-white">$750</h2>
                    <h6 class="text-white-50">Manajer lapangan</h6>
                </div>
            </div>
            <div class="card-body"><i class="text-white-50 fa fa-clock"></i>
                <span class="text-white-50">Updated</span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 mt-2">
        <div class="card bg-gradient-to-b bg-dark">
            <div class="card-header">
                <img class="fa-pull-right" src="{{ asset('assets/icon/Driver.svg') }}" width="50" alt="">
                <div class="float-start">
                    <h2 class="text-white"><i class="fa fa-users"></i>&emsp;{{ $tAdmin }}</h2>
                    <h6 class="text-white-50">Admin</h6>
                </div>
            </div>
            <div class="card-body"><i class="text-white-50 fa fa-clock"></i>
                <span class="text-white-50">Updated</span>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
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
                <h5 class="text-dark fa-pull-left">Driver</h5>
                @if (Auth::user()->status_id == 1)
                    <a href="#" class="btn btn-success rounded-pill fa-pull-right text-capitalize">Terverifikasi</a>
                @endif
                @if (Auth::user()->status_id == 2)
                    <a href="#" class="btn btn-danger rounded-pill fa-pull-right text-capitalize">Non Aktif</a>
                @endif
                @if (Auth::user()->status_id == 3)
                    <a href="#" class="btn btn-warning rounded-pill fa-pull-right text-capitalize">Sedang dalam orderan</a>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
