<ul>
    @foreach ($tracking->where('checkout_id', $check->id) as $track)

        @if ($track->status == 1)
            <li class="complete">
                <a href="#">Driver menerima pesanan anda<i class="ico fa fa-check ico-green"></i>
                    <span class="desc">Paket anda diantar oleh <b>username</b>
                    </span>
                </a>
            </li>
            <li>
                <a href="#">Driver menuju ke {{ $check->orders->alamat_jemput }}<i class="desc"></i>
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
                <a href="#">Driver menuju ke {{ $check->orders->alamat_jemput }}<i
                        class="ico fa fa-check ico-green"></i>
                    <span class="desc">Paket akan segera dijemput</span>
                </a>
            </li>
            <li>
                <a href="#">Driver sampai di lokasi {{ $check->orders->alamat_jemput }}
                    <span class="desc">Driver akan segera mengirim paket ke alamat
                        tujuan</span>
                </a>
            </li>
        @endif
        @if ($track->status == 3)
            <li class="complete">
                <a href="#">Driver menerima pesanan anda<em class="ico fa fa-check ico-green"></em>
                    <span class="desc">Paket anda diantar oleh <strong>username</strong>
                    </span>
                </a>
            </li>
            <li class="complete prev-step">
                <a href="#">Driver menuju ke lokasi {{ $check->orders->alamat_jemput }}<em
                        class="ico fa fa-check ico-green"></em>
                    <span class="desc">Paket akan segera dijemput</span>
                </a>
            </li>
            <li class="complete prev-step">
                <a href="#">Driver sampai di lokasi {{ $check->orders->alamat_jemput }}<i
                        class="ico fa fa-check ico-green"></i>
                    <span class="desc">Driver akan segera mengirim pake ke alamat
                        tujuan</span>
                </a>
            </li>

        @endif

        @foreach ($track_status->where('track_id', $track->id) as $status)
            @if ($status->status == 'Konfirmasi')
                <style>
                    .konfirmasi{{ $track->id }} {
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
                            <button onclick="konfirmasi()" type="submit" class="btn btn-danger text-capitalize">Anda menerima paket</button>
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
                    <a href="#">Driver menuju ke lokasi {{ $check->orders->alamat_jemput }}<i
                            class="ico fa fa-check ico-green"></i>
                        <span class="desc">{{ $track->updated_at }} - Paket akan segera dijemput</span>
                    </a>
                </li>
                <li class="complete prev-step">
                    <a href="#">Driver sampai di lokasi {{ $check->orders->alamat_jemput }}<i
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
            <div class="text-center mt-4 konfirmasi{{ $track->id }}">
                <button type="button" class="btn btn-success text-center" data-mdb-dismiss="modal" data-mdb-toggle="modal" onclick="scrollBot({{ $track->id }})" data-mdb-target="#chatting{{ $track->id }}">
                    <i class="fa fa-comment"></i> Hubungi Driver
                  </button>

                  
            </div>
          
    @endforeach
</ul>
