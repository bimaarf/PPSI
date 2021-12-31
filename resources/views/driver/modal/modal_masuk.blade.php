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
                    @if ($item->message == 'Finded')
                        <form id="form-terima{{ $item->id }}" action="{{ route('driver.terima', ['id' => $item->id]) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-success rounded-5 btn-lg text-capitalize" onclick="terima({{ $item->id }})" style="width:100%">Terima Pesanan</button>
                        </form>
                        
                        <form id="form-tolak{{ $item->id }}" action="{{ route('driver.tolak', ['id' => $item->id]) }}" method="get">
                            @csrf
                            @foreach ($user->where('status_id', '=', 1)->slice(0,1) as $usr)
                                @if ($usr->id != Auth::user()->id)
                                    <input id="driver_id" type="text" name="driver_id" value="3">
                                @endif
                            @endforeach
                            <button id="tolak" onclick="tolak({{ $item->id }})" type="submit" class="btn btn-danger rounded-5 btn-lg text-capitalize mt-2" style="width:100%">Tolak Pesanan</button>
                        </form>
                    @endif
                    <a href="" class="btn btn-outline-white-50 rounded-5 btn-lg mt-2 text-capitalize" style="width:100%">Bantuan</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>