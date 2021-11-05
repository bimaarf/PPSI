@extends('layouts.backend.main_login')
@section('dashboard', 'active')
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

    <div class="container pt-4 t-window">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin</li>
            </ol>
        </nav>
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
        <div class="row">
            <div class="col-lg-4 mt-4">
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
            <div class="col-lg-4 mt-4">
                <div class="card rounded-9">
                    <div class="card-header">
                        <h4 class="text-dark"><b>Profil Kamu</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <h5 class="text-dark">Nomor HP</h5>
                                <h5 class="text-dark">Alamat</h5>
                            </div>
                            <div class="col-7">
                                <h5 class="text-black-50">{{ Auth::user()->telp }}</h5>
                                <h5 class="text-black-50">{{ Auth::user()->alamat }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card rounded-9 mt-4">
                    <div class="card-header">
                        <h4 class="text-dark"><b>Hak Akses</b></h4>
                    </div>
                    <div class="card-body">
                        @foreach ($permission_user as $pUser)
                            <div class="form-check form-switch mt-3">
                                <input class="form-check-input" checked type="checkbox" id="{{ $pUser->permission->id }}" name="" value="{{ $pUser->permission->display_name }}" disabled>
                                <label class="form-check-label" for="{{ $pUser->permission->id }}"> {{ $pUser->permission->display_name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4">
                <div class="card rounded-9">
                    <div class="card-header">
                        <h4 class="text-dark"><b>Jenis akun</b></h4>
                    </div>
                    <div class="card-body">
                        <h5 class="text-dark fa-pull-left">Admin</h5>
                        <a href="#" class="btn btn-success rounded-pill fa-pull-right text-capitalize">Terverifikasi</a>
                    </div>
                </div>
                <div class="card rounded-9 mt-4">
                    <div class="card-header">
                        <h4 class="text-dark"><b>Aktivitas Admin</b></h4>
                    </div>
                    <div class="card-body example" style="height:300px;
                    overflow-y: scroll;">
                        <div>
                            <img class="rounded-circle img-thumbnail" width="40" src="{{ asset('assets/icon/Driver.svg') }}" alt="">
                            <span class="text-dark "><b>Admin 1</b></span>
                            
                            {{-- <img src="{{ asset('assets/verified/verified.svg') }}" class="float-start mt-2 px-1" width="19" alt=""> --}}
                            
                            <span class="px-1">Menambahkan Saiful Jamil sebagai admin</span>
                            <small style="font-size: 10px" class="position-relative">24-09-2001 12:09</small>
                        </div>
                        <div>
                            <img class="rounded-circle img-thumbnail" width="40" src="{{ asset('assets/icon/Driver.svg') }}" alt="">
                            <span class="text-dark "><b>Admin 2</b></span>
                            
                            {{-- <img src="{{ asset('assets/verified/verified.svg') }}" class="float-start mt-2 px-1" width="19" alt=""> --}}
                            
                            <span class="px-1">Menonaktifkan Farhat Abbas sebagai admin</span>
                            <small style="font-size: 10px" class="position-relative">24-09-2001 12:09</small>
                        </div>
                        <div>
                            <img class="rounded-circle img-thumbnail" width="40" src="{{ asset('assets/icon/Driver.svg') }}" alt="">
                            <span class="text-dark "><b>Admin 3</b></span>
                            
                            {{-- <img src="{{ asset('assets/verified/verified.svg') }}" class="float-start mt-2 px-1" width="19" alt=""> --}}
                            
                            <span class="px-1">Merubah hak akses Saiful jamil sebagai admin</span>
                            <small style="font-size: 10px" class="position-relative">24-09-2001 12:09</small>
                        </div>
                        <div>
                            <img class="rounded-circle img-thumbnail" width="40" src="{{ asset('assets/icon/Driver.svg') }}" alt="">
                            <span class="text-dark "><b>Admin 1</b></span>
                            
                            {{-- <img src="{{ asset('assets/verified/verified.svg') }}" class="float-start mt-2 px-1" width="19" alt=""> --}}
                            
                            <span class="px-1">Menambahkan Saiful Jamil sebagai admin</span>
                            <small style="font-size: 10px" class="position-relative">24-09-2001 12:09</small>
                        </div>
                        <div>
                            <img class="rounded-circle img-thumbnail" width="40" src="{{ asset('assets/icon/Driver.svg') }}" alt="">
                            <span class="text-dark "><b>Admin 2</b></span>
                            
                            {{-- <img src="{{ asset('assets/verified/verified.svg') }}" class="float-start mt-2 px-1" width="19" alt=""> --}}
                            
                            <span class="px-1">Menonaktifkan Farhat Abbas sebagai admin</span>
                            <small style="font-size: 10px" class="position-relative">24-09-2001 12:09</small>
                        </div>
                        <div>
                            <img class="rounded-circle img-thumbnail" width="40" src="{{ asset('assets/icon/Driver.svg') }}" alt="">
                            <span class="text-dark "><b>Admin 3</b></span>
                            
                            {{-- <img src="{{ asset('assets/verified/verified.svg') }}" class="float-start mt-2 px-1" width="19" alt=""> --}}
                            
                            <span class="px-1">Merubah hak akses Saiful jamil sebagai admin</span>
                            <small style="font-size: 10px" class="position-relative">24-09-2001 12:09</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
