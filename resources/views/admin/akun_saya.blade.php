@extends('admin.main')
@section('akun-saya', 'active')
@section('content')
<div class="card rounded">
    <div class="card-body">
        <div class="fs-5">
            <i class="fas fa-home text-primary"></i>&emsp;<b>Beranda&emsp;/&emsp;Akun Saya</b>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-lg-5 mt-2">
            <div class="card rounded-9">
                <div class="text-center">
                    <img src="{{ asset('assets/icon/Driver.svg') }}" class="img-fluid rounded mt-4" width="200vh" alt="">
                    <h4 class="text-capitalize text-dark mt-4"><b>{{ Auth::user()->name }}</b></h4>
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
        <div class="col-lg-7 mt-2">
            <div class="card rounded-9">
                <div class="card-header">
                    <h4 class="text-dark"><b>Profil Kamu</b></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <h5 class="text-dark">Nama Lengkap</h5>
                            <h5 class="text-dark">Email</h5>
                            <h5 class="text-dark">Nomor HP</h5>
                            <h5 class="text-dark">Status</h5>
                            <h5 class="text-dark">Alamat</h5>
                            <h5 class="text-dark">Jenis Akun</h5>
                        </div>
                        <div class="col-1">
                            <h5>:</h5>
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
                            <h5 class="text-black-50"><a href="" data-mdb-toggle="modal"
                                    data-mdb-target="#permission">Admin</a></h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card rounded-9 mt-2">
                <div class="card-header">
                    <h4 class="text-dark"><b>Aktivitas Admin</b></h4>
                </div>
                <div class="card-body example" style="height:200px;
                overflow-y: scroll;">

                    @foreach ($activity as $activ)
                        <div class="mt-1">
                            <img class="rounded-circle img-thumbnail" width="40"
                                src="{{ asset('assets/icon/Driver.svg') }}" alt="">
                            <span class="text-dark text-capitalize"><b>{{ $activ->title }}</b></span>

                            {{-- <img src="{{ asset('assets/verified/verified.svg') }}" class="float-start mt-2 px-1" width="19" alt=""> --}}

                            <span class="px-1">{{ $activ->message }}</span>
                            <small style="font-size: 10px" class="position-relative">{{ $activ->created_at }}</small>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- modal admin aktivity --}}

    <!-- Modal -->
    <div class="modal top fade" id="permission" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-mdb-backdrop="true" data-mdb-keyboard="true">
        <div class="modal-dialog modal-lg  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-capitalize text-dark central" id="exampleModalLabel"><i
                            class="fa fa-user"></i>&emsp;Profil Kamu</h4>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card rounded-9">
                                <div class="card-header">
                                    <h4 class="text-dark"><b>Jenis akun</b></h4>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-dark fa-pull-left">Admin</h5>
                                    @if (Auth::user()->status_id == 1)
                                        <a href="#"
                                            class="btn btn-success rounded-pill fa-pull-right text-capitalize">Terverifikasi</a>
                                    @endif
                                    @if (Auth::user()->status_id == 2)
                                        <a href="#" class="btn btn-danger rounded-pill fa-pull-right text-capitalize">Non
                                            Aktif</a>
                                    @endif
                                    @if (Auth::user()->status_id == 3)
                                        <a href="#"
                                            class="btn btn-warning rounded-pill fa-pull-right text-capitalize">Sibuk</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card rounded-9">
                                <div class="card-header">
                                    <h4 class="text-dark"><b>Hak Akses</b></h4>
                                </div>
                                <div class="card-body">
                                    @foreach ($permission_user->where('user_id', Auth::user()->id) as $pUser)
                                        <div class="form-check form-switch mt-3">
                                            <input class="form-check-input" checked type="checkbox"
                                                id="{{ $pUser->permission->id }}" name=""
                                                value="{{ $pUser->permission->display_name }}" disabled>
                                            <label class="form-check-label" for="{{ $pUser->permission->id }}">
                                                {{ $pUser->permission->display_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
