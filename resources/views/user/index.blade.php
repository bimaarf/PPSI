@extends('layouts.backend.main_login')
@section('akun-saya', 'active')
@section('content')

    <div class="card rounded">
        <div class="card-body">
            <div class="fs-5">
                <em class="fas fa-home text-primary"></em>&emsp;<strong>Beranda</strong>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-5">
            <div class="card rounded">
                <div class="text-center">
                    <img src="{{ asset('assets/icon/Shipper.svg') }}" class="img-fluid rounded mt-4" width="200vh" alt="">
                    <h4 class="text-capitalize text-dark mt-4"><strong>{{ Auth::user()->name }}</strong></h4>
                    <h5 class="text-lowercase text-dark">{{ Auth::user()->email }}</h5>
                    <form action="">
                        <h6>Ubah Password</h6>
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
            <div class="card rounded">
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
            <div class="card rounded mt-2">
                <div class="card-header">
                    <div class="row">
                        <a href="{{ route('orders.form_1') }}"
                            class="btn btn-primary text-capitalize col-lg-12 rounded">Pesan Armada</a>
                    </div>
                </div>
            </div>
            <div class="card rounded mt-2">
                <div class="card-header">
                    <h4 class="text-dark text-capitalize text-center">Jenis Akun</h4>
                </div>
                <div class="card-body">
                    <h5 class="text-dark fa-pull-left">Shipper</h5>
                    @if (Auth::user()->status_id == 1)
                        <a href="#" class="btn btn-success rounded-pill fa-pull-right text-capitalize">Terverifikasi</a>
                    @endif
                    @if (Auth::user()->status_id == 2)
                        <a href="#" class="btn btn-danger rounded-pill fa-pull-right text-capitalize">Non Aktif</a>
                    @endif
                    @if (Auth::user()->status_id == 3)
                        <a href="#" class="btn btn-warning rounded-pill fa-pull-right text-capitalize">Sibuk</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
