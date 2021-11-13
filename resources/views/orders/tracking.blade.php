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
            @if ($item->message == 'Verified')
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
                                    @if ($track->status == 1)
                                        <li class="complete">
                                            <a href="#">Driver menerima pesanan anda<i class="ico fa fa-check ico-green"></i>
                                                <span class="desc">Paket anda diantar oleh <b>username</b>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Driver menuju ke {{ $item->orders->alamat_jemput }}<i
                                                    class="desc"></i>
                                                <span class="desc">Paket akan segera dijemput</span>
                                            </a>
                                        </li>
                                    @endif
                                    @if ($track->status == 2)
                                        <li class="complete">
                                            <a href="#">Driver menerima pesanan anda<i
                                                    class="ico fa fa-check ico-green"></i>
                                                <span class="desc">Pesanan anda akan segera di proses.
                                                </span>
                                            </a>
                                        </li>
                                        <li class="complete prev-step">
                                            <a href="#">Driver menuju ke {{ $item->orders->alamat_jemput }}<i
                                                    class="ico fa fa-check ico-green"></i>
                                                <span class="desc">Paket akan segera dijemput</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Driver sampai di lokasi {{ $item->orders->alamat_jemput }}
                                                <span class="desc">Driver akan segera mengirim paket ke alamat
                                                    tujuan</span>
                                            </a>
                                        </li>
                                    @endif
                                    @if ($track->status == 3)
                                        <li class="complete">
                                            <a href="#">Driver menerima pesanan anda<i class="ico fa fa-check ico-green"></i>
                                                <span class="desc">{{ $track->updated_at }} - Paket anda diantar oleh <b>username</b>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="complete prev-step">
                                            <a href="#">Driver menuju ke lokasi {{ $item->orders->alamat_jemput }}<i
                                                    class="ico fa fa-check ico-green"></i>
                                                <span class="desc">{{ $track->updated_at }} - Paket akan segera dijemput</span>
                                            </a>
                                        </li>
                                        <li class="complete prev-step">
                                            <a href="#">Driver sampai di lokasi {{ $item->orders->alamat_jemput }}<i
                                                    class="ico fa fa-check ico-green"></i>
                                                <span class="desc">{{ $track->updated_at }} - Driver akan segera mengirim pake ke alamat
                                                    tujuan</span>
                                            </a>
                                        </li>

                                    @endif

                                    @foreach ($track_status->where('track_id', $track->id) as $status)

                                        @if ($status->status == 'Sampai')
                                            <ul class="row">

                                                <li class="locked col-lg-9">
                                                    <a href="#">Paket sampai di {{ $status->alamat }}<i
                                                            class="ico fa fa-lock ico-muted"></i>
                                                        <span class="desc">Pastikan paket sudah anda terima
                                                            sebelum menekan tombol konfirmasi!</span>
                                                    </a>
                                                </li>
                                                <li class="col-lg-3 mt-3">
                                                    <form action="{{ route('shipper.konfirmasi', ['id' => $status->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success ">Konfirmasi</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        @endif
                                        @if ($status->status == 'Belum sampai')
                                            <li>
                                                <a href="#">Paket diantar ke {{ $status->alamat }}
                                                    <span class="desc">Paket akan diantar ke
                                                        {{ $status->alamat }}.</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($status->status == 'Konfirmasi')
                                            <li class="complete prev-step">
                                                <a href="#">Paket sudah anda terima.<i
                                                        class="ico fa fa-check ico-green"></i>
                                                    <span class="desc">Paket sudah sampai di
                                                        {{ $status->alamat }}.</span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                    @endforeach
                                </ul>
                                <div class="text-center">
                                    <a href="{{ route('chat.index', ['id' => $track->id]) }}"
                                        class="btn btn-success">Hubungi Driver</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
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
