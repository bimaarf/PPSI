<div class="modal top fade" id="detail-proses{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog modal-xl  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Info Pengiriman</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8" id="read">
                        @include('driver.modal.elements.resi')
                    </div>
                    <div class="col-lg-4 border-start">
                        @foreach ($trackings->where('checkout_id', $item->id) as $track)
                            @if ($track->status == 1)
                                <form id="jemput-pesanan{{ $track->id }}" action="{{ route('driver.jemput', ['id' => $track->id]) }}" method="get">
                                    @csrf
                                    <input id="checkout_id" type="hidden" value="{{ $item->id }}" name="checkout_id">
                                    <button onclick="jemputPesanan({{ $track->id }})" type="submit" class="btn btn-success rounded-5 btn-lg mt-2 text-capitalize"
                                        style="width:100%">Jemput Pesanan</button>
                                </form>
                            @endif
                            @if ($track->status == 2)
                                <form id="antar-pesanan{{ $track->id }}" action="{{ route('driver.antar', ['id' => $track->id]) }}" method="get">
                                    @csrf
                                    <input id="checkout_id" type="hidden" value="{{ $item->id }}" name="checkout_id">
                                    <button onclick="antarkanPesanan({{ $track->id }})" type="submit" class="btn btn-info rounded-5 btn-lg mt-2 text-capitalize"
                                        style="width:100%">Antarkan Pesanan</button>
                                </form>
                            @endif
                            @if ($track->status == 3)
                                <div class="bs-vertical-wizard row">
                                    @foreach ($track_status->where('track_id', $track->id) as $tr)
                                        @if ($tr->status == 'Belum sampai')
                                            <ul>
                                                <li class="locked ">
                                                    <a href="#"><b class="text-capitalize">{{ $tr->alamat }}</b><i
                                                            class="ico fa fa-lock ico-muted"></i>
                                                        <span class="desc">Tekan konfirmasi jika paket sudah
                                                            sampai!</span>
                                                    </a>
                                                </li>
                                                <li class=" text-center">
                                                    <form id="konfirmasi-pesanan{{ $tr->id }}" action="{{ route('driver.sampai', ['id' => $tr->id]) }}"
                                                        method="get">
                                                        @csrf
                                                        <button onclick="konfirmasiPesanan({{ $tr->id }})" type="submit" class="btn btn-success btn-lg text-capitalize mt-2" style="width: 90%;">
                                                            Konfirmasi Pesanan</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        @endif
                                        <ul>
                                            @if ($tr->status == 'Sampai')
                                                <li class="complete">
                                                    <a href="#"><b class="text-capitalize">{{ $tr->alamat }}</b><i
                                                            class="ico fa fa-check ico-green"></i>
                                                        <span class="desc text-black-50">Paket telah sampai di
                                                            {{ $tr->alamat }} <i class="text-success">Sedang
                                                                menunggu konfirmasi dari
                                                                {{ $track->checkout->orders->nama_pengirim }}.</i></span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if ($tr->status == 'Konfirmasi')
                                                <li class="complete">
                                                    <a href="#"><b class="text-capitalize">{{ $tr->alamat }}</b><i
                                                            class="ico fa fa-check ico-green"></i>
                                                        <span class="desc">Paket telah sampai di
                                                            {{ $tr->alamat }} <i class="text-success">Sudah
                                                                diterima oleh </i><b
                                                                class="text-capitalize">{{ $track->checkout->orders->nama_pengirim }}</b></span>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    @endforeach
                                </div>
                            @endif

                        @endforeach

                        <a href="" class="btn btn-outline-white-50 rounded-5 btn-lg mt-2 text-capitalize"
                            style="width:100%">Bantuan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
