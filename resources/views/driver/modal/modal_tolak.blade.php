<div class="modal top fade" id="detail{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Info Pengiriman</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-9">
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
                <div class="col-lg-3 border-start">
                    <a href="" class="btn btn-outline-white-50 rounded-5 btn-lg mt-2 text-capitalize" style="width:100%">Bantuan</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>