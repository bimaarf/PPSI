<div class="modal top fade" id="order{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
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
                            <b class="text-capitalize">{{ $item->nama_pengirim }}</b>
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
                            {{ $item->jemput }}
                        </div>

                        {{-- breack --}}

                        <div class="col-4">
                            Alamat Jemput
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            {{ $item->alamat_jemput }}
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
                                @foreach (json_decode($item->tujuan) as $tujuan)
                                    <li>{{ $tujuan }}</li>
                                @endforeach
                            </ol>
                        </div>
                        
                        {{-- break --}}

                        <div class="col-4">
                            Alamat Tujuan
                        </div>
                        <div class="col-1">
                            :
                        </div>

                        {{-- break --}}
                        <div class="col-7">
                            <ol>
                                @foreach (json_decode($item->alamat_tujuan) as $aTujuan)
                                   <li> {{ $aTujuan }}</li>
                                @endforeach

                            </ol>
                        </div>

                        {{-- break --}}

                        <div class="col-4">
                            Rentang Waktu
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            {{ $item->jadwal }}&emsp;{{ $item->start_time }}&nbsp;s/d&nbsp;{{ $item->arrival_time }}&nbsp;WIB
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 border-start">
                    <form action="{{ route('driver.find', ['id' => $item->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="message" value="Finded" >
                            @foreach ($driver->where('status_id', 1)->slice(0, $item->feed_m) as $drv)
                                <label for="">Driver id</label> <br>
                                <input type="text" name="driver_id[]" value="{{ $drv->id }}">

                            @endforeach
                            <br>
                        <input type="hidden" name="orders_id" value="{{ $item->id }}">
                        <input type="submit" class="btn btn-success rounded-5 btn-lg text-capitalize" style="width:100%" value="Temukan Driver">
                    </form>
                    <a href="{{ route('orders.hapus', ['id' => $item->id, 'key' => $item->key]) }}" class="btn btn-danger rounded-5 btn-lg mt-2 text-capitalize" style="width:100%">Batalkan Pesanan</a>
                    <a href="" class="btn btn-outline-white-50 rounded-5 btn-lg mt-2 text-capitalize" style="width:100%">Bantuan</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>