@extends('admin.main')
@section('dashboard', 'active')
@section('content')
    
<div class="card rounded">
    <div class="card-body">
        <div class="fs-5">
            <i class="fas fa-home text-primary"></i>&emsp;<b>Beranda</b>
        </div>
    </div>
</div>
<div class="card mt-2">
    <div class="row card-body">
        <div class="col-md-3 col-6 mt-2">
            <div class="card bg-primary">
                <div class="card-header">
                    <img class="fa-pull-right d-lg-block collapse" src="{{ asset('assets/icon/Driver.svg') }}" width="50" alt="">
                    <div class="float-start">
                        <h2 class="text-white"><i class="fa fa-users"></i>&emsp;{{ $tDriver }}</h2>
                        <h6 class="text-white-50">Driver</h6>
                    </div>
                </div>
                <div class="card-body"><i class="text-white-50 fa fa-clock"></i>
                    <span class="text-white-50">Updated</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 mt-2">
            <div class="card bg-success">
                <div class="card-header">
                    <img class="fa-pull-right d-lg-block collapse" src="{{ asset('assets/icon/Shipper.svg') }}" width="50" alt="">
                    <div class="float-start">
                        <h2 class="text-white"><i class="fa fa-users"></i>&emsp;{{ $tShipper }}</h2>
                        <h6 class="text-white-50">Shipper</h6>
                    </div>
                </div>
                <div class="card-body"><i class="text-white-50 fa fa-clock"></i>
                    <span class="text-white-50">Updated</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 mt-2">
            <div class="card bg-secondary">
                <div class="card-header">
                    <img class="fa-pull-right d-lg-block collapse" src="{{ asset('assets/icon/Driver.svg') }}" width="50" alt="">
                    <div class="float-start">
                        <h2 class="text-white">{{ $tChecker }}</h2>
                        <h6 class="text-white-50">Field Manager</h6>
                    </div>
                </div>
                <div class="card-body"><i class="text-white-50 fa fa-clock"></i>
                    <span class="text-white-50">Updated</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 mt-2">
            <div class="card bg-gradient-to-b bg-dark">
                <div class="card-header">
                    <img class="fa-pull-right d-lg-block collapse" src="{{ asset('assets/icon/Driver.svg') }}" width="50" alt="">
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
</div>
<div class="row mt-2">
    <div class="col-lg-6">

        <div class="card">
            <div class="card-header">
                <h4 class="text-dark"><b>Aktivitas Admin</b></h4>
            </div>
            <div class="card-body example komen" style="height:200px;
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
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('orders.form_1') }}" class="btn btn-lg btn-success text-capitalize">Tambahkan Pesanan</a>
            </div>
        </div>
    </div>
</div>
@endsection
