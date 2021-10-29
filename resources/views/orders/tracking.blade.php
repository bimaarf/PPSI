@extends('layouts.backend.main_login')
@section('detail', 'active')
@section('content')
    <div class="row">
        @foreach ($tracking as $track)
            <div class="col-lg-6 mt-2">
                <div class="card">
                    @foreach ($users->where('id', $track->driver_id) as $user)

                        <div class="card-header  text-center">{{ $track->checkout->orders->jemput }}
                            @foreach (explode(",", str_replace(array('[', '"', ']'), ' ',
                            $track->checkout->orders->tujuan)) as $info)
                            -{{ $info }}
                    @endforeach
                </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <div class="bs-vertical-wizard">
                        <ul>
                            @if ($track->status == 1)
                                <li class="complete">
                                    <a href="#">Paket telah dikonfirmasi oleh driver<i class="ico fa fa-check ico-green"></i>
                                        <span class="desc">Paket anda diantar oleh <b>{{ $user->name }}</b>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Driver sedang dalam perjalanan ke lokasi anda<i class="desc"></i>
                                        <span class="desc">Paket akan segera dijemput</span>
                                    </a>
                                </li>
                            @endif
                            @if ($track->status == 2)
                                <li class="complete">
                                    <a href="#">Paket telah dikonfirmasi oleh driver<i
                                            class="ico fa fa-check ico-green"></i>
                                        <span class="desc">Paket anda diantar oleh <b>{{ $user->name }}</b>
                                        </span>
                                    </a>
                                </li>
                                <li class="complete prev-step">
                                    <a href="#">Driver sedang dalam perjalanan ke lokasi anda<i
                                            class="ico fa fa-check ico-green"></i>
                                        <span class="desc">Paket akan segera dijemput</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Driver sampai di lokasi anda
                                        <span class="desc">Driver akan segera mengirim paket</span>
                                    </a>
                                </li>
                            @endif
                            @if ($track->status == 3)
                                <li class="complete">
                                    <a href="#">Paket telah dikonfirmasi oleh driver<i
                                            class="ico fa fa-check ico-green"></i>
                                        <span class="desc">Paket anda diantar oleh <b>{{ $user->name }}</b>
                                        </span>
                                    </a>
                                </li>
                                <li class="complete prev-step">
                                    <a href="#">Driver sedang dalam perjalanan ke lokasi anda<i
                                            class="ico fa fa-check ico-green"></i>
                                        <span class="desc">Paket akan segera dijemput</span>
                                    </a>
                                </li>
                                <li class="complete prev-step">
                                    <a href="#">Driver sampai di lokasi anda<i class="ico fa fa-check ico-green"></i>
                                        <span class="desc">Driver akan segera mengirim paket</span>
                                    </a>
                                </li>
                                <li class="complete prev-step">
                                    <a href="#">Paket dikirim ke alamat tujuan<i class="ico fa fa-check ico-green"></i>
                                        <span class="desc">Paket sedang dalam perjalanan ke alamat tujuan.</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Paket sampai di lokasi tujuan
                                        <span class="desc">Paket sudah sampai ke alamat tujuan</span>
                                    </a>
                                </li>
                            @endif
                            @if ($track->status == 4)
                                <li class="complete">
                                    <a href="#">Paket telah dikonfirmasi oleh driver<i
                                            class="ico fa fa-check ico-green"></i>
                                        <span class="desc">Paket anda diantar oleh <b>{{ $user->name }}</b>
                                        </span>
                                    </a>
                                </li>
                                <li class="complete prev-step">
                                    <a href="#">Driver sedang dalam perjalanan ke lokasi anda<i
                                            class="ico fa fa-check ico-green"></i>
                                        <span class="desc">Paket akan segera dijemput</span>
                                    </a>
                                </li>
                                <li class="complete prev-step">
                                    <a href="#">Driver sampai di lokasi anda<i class="ico fa fa-check ico-green"></i>
                                        <span class="desc">Driver akan segera mengirim paket</span>
                                    </a>
                                </li>
                                <li class="complete prev-step">
                                    <a href="#">Paket dikirim ke alamat tujuan<i class="ico fa fa-check ico-green"></i>
                                        <span class="desc">Paket sedang dalam perjalanan ke alamat tujuan.</span>
                                    </a>
                                </li>
                                <li class="complete prev-step">
                                    <a href="#">Paket sampai di lokasi tujuan<i class="ico fa fa-check ico-green"></i>
                                        <span class="desc">Paket sudah sampai ke alamat tujuan</span>
                                    </a>
                                </li>
                            @endif
                            @if ($track->status == 5)
                                <li class="complete">
                                    <a href="#">Paket telah dikonfirmasi oleh driver<i
                                            class="ico fa fa-check ico-green"></i>
                                        <span class="desc">Paket anda diantar oleh <b>{{ $user->name }}</b>
                                        </span>
                                    </a>
                                </li>
                                <li class="complete prev-step">
                                    <a href="#">Driver sedang dalam perjalanan ke lokasi anda<i
                                            class="ico fa fa-check ico-green"></i>
                                        <span class="desc">Paket akan segera dijemput</span>
                                    </a>
                                </li>
                                <li class="complete prev-step">
                                    <a href="#">Driver sampai di lokasi anda<i class="ico fa fa-check ico-green"></i>
                                        <span class="desc">Driver akan segera mengirim paket</span>
                                    </a>
                                </li>
                                <li class="complete prev-step">
                                    <a href="#">Paket dikirim ke alamat tujuan<i class="ico fa fa-check ico-green"></i>
                                        <span class="desc">Paket sedang dalam perjalanan ke alamat tujuan.</span>
                                    </a>
                                </li>
                                <li class="complete prev-step">
                                    <a href="#">Paket sampai di lokasi tujuan<i class="ico fa fa-check ico-green"></i>
                                        <span class="desc">Paket sudah sampai ke alamat tujuan</span>
                                    </a>
                                </li>
                            @endif
                            @if ($track->status == 6)
                                <li class="locked">
                                    <a href="#">Konfirmasi pesanan<i class="ico fa fa-lock ico-muted"></i>
                                        <span class="desc">Tekan konfirmasi jika paket sudah anda terima.</span>
                                    </a>
                                </li>

                            @endif
                        </ul>
                    </div>
                </div>
                <div class="text-center mb-4">
                    @if ($track->status == 4)
                    <button class="btn btn-primary ">Konfirmasi</button>
                        @endif
                        <a href="{{ route('chat.index', ['id' => $track->id]) }}" class="btn btn-success">Hubungi
                            Driver</a>
                    </div>

                <div class="card-footer text-muted">{{ $track->created_at }}</div>
        @endforeach
    </div>
    </div>
    @endforeach
@endsection
