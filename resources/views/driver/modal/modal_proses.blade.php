<div class="modal top fade" id="detail{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog modal-xl  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Info Pengiriman</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-4">
                            Nama Pengirim
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            <b class="text-capitalize">{{ $item->orders->nama_pengirim }}</b>
                        </div>

                        {{-- breack --}}
                        <div class="col-4">
                            No. Resi
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            10002692844212
                        </div>

                        {{-- breack --}}

                        <div class="col-4">
                            Dari
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            {{ $item->orders->jemput }}
                        </div>

                        {{-- breack --}}

                        <div class="col-4">
                            Tujuan
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            <ol>
                                @foreach (json_decode($item->orders->tujuan) as $tujuan)
                                    <li>{{ $tujuan }}</li>
                                @endforeach
                            </ol>
                        </div>
                        
                        {{-- break --}}

                        <div class="col-4">
                            Alamat
                        </div>
                        <div class="col-1">
                            :
                        </div>

                        {{-- break --}}
                        <div class="col-7">
                            <ol>
                                @foreach (json_decode($item->orders->alamat_tujuan) as $aTujuan)
                                   <li> {{ $aTujuan }}</li>
                                   <li> {{ $aTujuan }}</li>
                                @endforeach

                            </ol>
                        </div>

                        {{-- break --}}

                        <div class="col-4">
                            <b>Total Bayar</b>
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            <b class="text-capitalize">Rp 750.000</b>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 border-start">
                    @foreach ($trackings->where('checkout_id', $item->id) as $track)

                        @if ($track->status == 1)
                        <form action="{{ route('driver.jemput', ['id' => $track->id]) }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" name="checkout_id">
                            <button type="submit" class="btn btn-success rounded-5 btn-lg mt-2 text-capitalize" style="width:100%">Jemput Pesanan</button>
                        </form>
                        @endif
                        @if ($track->status == 2)
                        <form action="{{ route('driver.antar', ['id' => $track->id]) }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" name="checkout_id">
                            <button type="submit" class="btn btn-success rounded-5 btn-lg mt-2 text-capitalize" style="width:100%">Antarkan Pesanan</button>
                        </form>
                        @endif
                        @if ($track->status == 3)
                        <div class="bs-vertical-wizard row">
                            @foreach ($track_status->where('track_id', $track->id) as $tr)
                                @if ($tr->status == 'Belum sampai')
                                    <ul class="row">
                                        <li class="locked col-8">
                                            <a href="#"><b class="text-capitalize">{{ $tr->alamat }}</b><i class="ico fa fa-lock ico-muted"></i>
                                                <span class="desc">Tekan konfirmasi jika paket sudah sampai!</span>
                                            </a>
                                        </li>
                                        <li class="col-4">
                                            <form action="{{ route('driver.sampai', ['id' => $tr->id]) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-success mt-4"> Konfirmasi</button>
                                            </form>
                                        </li>
                                    </ul>
                                @endif
                                <ul>
                                @if ($tr->status == 'Sampai')
                                        <li class="complete">
                                            <a href="#"><b class="text-capitalize">{{ $tr->alamat }}</b><i class="ico fa fa-check ico-green"></i>
                                                <span class="desc text-black-50">Paket telah sampai di {{ $tr->alamat }} <i class="text-success">Sedang menunggu konfirmasi dari {{ $track->checkout->orders->nama_pengirim }}.</i></span>
                                            </a>
                                        </li>
                                    @endif
                                    @if ($tr->status == 'Konfirmasi')
                                        <li class="complete">
                                            <a href="#"><b class="text-capitalize">{{ $tr->alamat }}</b><i class="ico fa fa-check ico-green"></i>
                                                <span class="desc">Paket telah sampai di {{ $tr->alamat }} <i class="text-success">Sudah diterima oleh </i><b class="text-capitalize">{{ $track->checkout->orders->nama_pengirim }}</b></span>
                                            </a>
                                        </li> 
                                    @endif
                                </ul>
                            @endforeach
                        </div>
                        @endif
                        
                    @endforeach

                    <a href="" class="btn btn-outline-white-50 rounded-5 btn-lg mt-2 text-capitalize" style="width:100%">Bantuan</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>