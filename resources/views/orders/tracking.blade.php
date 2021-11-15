@extends('layouts.backend.main_login')
@section('pesanan-diproses', 'active')
@section('content')
<div class="card rounded">
    <div class="card-body">
        <div class="fs-5">
            <i class="fas fa-home text-primary"></i>&emsp;<b>Beranda&emsp;/&emsp;Lacak</b>
        </div>
    </div>
</div>
    <div class="row">
        @foreach ($checkout->where('orders_id', $orders->id) as $item)
            @if ($item->message != 'Finded')
            <div class="col-lg-6 mt-2">
                <div class="card">
                    <div class="card-header text-center">{{ $orders->jemput }}
                        @foreach (json_decode($item->orders->tujuan) as $info)
                            -{{ $info }}
                        @endforeach
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <div class="bs-vertical-wizard">
                            <ul>
                                @foreach ($tracking->where('checkout_id', $item->id) as $track)
                                    @include('orders.proses.proses')
                                @endforeach
                                </ul>
                                <div class="text-center mt-4 konfirmasi">
                                    <button type="button" id="hulk" class="btn btn-success text-capitalize" onclick="create() open()" data-mdb-toggle="modal" data-mdb-target="#exampleModal{{ $track->id }}"><i class="fa fa-comment text-white"></i> Hubungi Driver</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('orders.modal.chattings')
            @endif
            @if ($item->message == 'Finded')
            <div class="col-lg-6 mt-2">
                <div class="card">
                    <div class="card-header text-center">{{ $orders->alamat_jemput }}
                        @foreach (json_decode($item->orders->alamat_tujuan) as $info)
                            -{{ $info }}
                        @endforeach
                    </div>
                    <div class="card-body">
                        <div class="bs-vertical-wizard">
                            <ul>
                                <li>
                                    <a href="#">Driver belum menerima orderan.<i
                                            class="desc"></i>
                                        <span class="desc">Mohon tunggu, kami akan carikan driver lain jika driver saat menolak orderan</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
@endsection
