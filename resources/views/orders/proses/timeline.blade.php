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
                <a href="#">Driver menuju ke {{ $item->orders->alamat_jemput }}<i class="desc"></i>
                    <span class="desc">Paket akan segera dijemput</span>
                </a>
            </li>
        @endif
        @if ($track->status == 2)
            <li class="complete">
                <a href="#">Driver menerima pesanan anda<i class="ico fa fa-check ico-green"></i>
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
                    <span class="desc">Paket anda diantar oleh <b>username</b>
                    </span>
                </a>
            </li>
            <li class="complete prev-step">
                <a href="#">Driver menuju ke lokasi {{ $item->orders->alamat_jemput }}<i
                        class="ico fa fa-check ico-green"></i>
                    <span class="desc">Paket akan segera dijemput</span>
                </a>
            </li>
            <li class="complete prev-step">
                <a href="#">Driver sampai di lokasi {{ $item->orders->alamat_jemput }}<i
                        class="ico fa fa-check ico-green"></i>
                    <span class="desc">Driver akan segera mengirim pake ke alamat
                        tujuan</span>
                </a>
            </li>

        @endif

        @foreach ($track_status->where('track_id', $track->id) as $status)
            @if ($status->status == 'Konfirmasi')
                <style>
                    .konfirmasi {
                        display: none;
                    }

                </style>
            @endif
            @if ($status->status == 'Sampai')
                <ul>
                    <li class="locked ">
                        <a href="#">Paket sampai di {{ $status->alamat }}<i class="ico fa fa-lock ico-muted"></i>
                            <span class="desc">Pastikan paket sudah anda terima
                                sebelum menekan tombol konfirmasi!</span>
                        </a>
                    </li>
                    <li class="text-center">
                        <form action="{{ route('shipper.konfirmasi', ['id' => $status->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary ">Konfirmasi</button>
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
                <li class="complete">
                    <a href="#">Driver menerima pesanan anda<i class="ico fa fa-check ico-green"></i>
                        <span class="desc">{{ $track->updated_at }} - Paket anda diantar oleh
                            <b>username</b>
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
                        <span class="desc">{{ $track->updated_at }} - Driver akan segera mengirim pake
                            ke
                            alamat
                            tujuan</span>
                    </a>
                </li>
                <li class="complete prev-step ">
                    <a href="#">Paket sampai di {{ $status->alamat }}<i class="ico fa fa-check ico-green"></i>
                        <span class="desc">Pastikan paket sudah anda terima
                            sebelum menekan tombol konfirmasi!</span>
                    </a>
                </li>
                <li class="complete prev-step">
                    <a href="#">Paket sudah anda terima.<i class="ico fa fa-check ico-green"></i>
                        <span class="desc">Paket sudah sampai di
                            {{ $status->alamat }}.</span>
                    </a>
                </li>
            @endif
        @endforeach
            @endforeach
        </ul>
            
        <div class="text-center mt-4 konfirmasi">
            <button type="button" id="hulk" class="btn btn-success text-capitalize" data-mdb-toggle="modal" data-mdb-target="#exampleModal{{ $track->id }}"><i class="fa fa-comment text-white"></i> Hubungi Driver</button>
        </div>
    </div>
</div>
@include('orders.modal.chattings')
