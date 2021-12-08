<div class="modal top fade" id="order{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog modal-xl  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-9">
                    @include('user.modal.elements.resi')
                </div>
                <div class="col-lg-3 border-start">
                    @if ($item->status == null)
                        
                    <form action="{{ route('driver.find', ['id' => $item->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="message" value="Finded" >
                        @foreach ($driver->where('status_id', 1)->slice(0, $item->feed_m) as $drv)
                        {{-- <label for="">Driver id</label> <br> --}}
                        <input type="text" name="driver_id[]" value="{{ $drv->id }}">
                        
                        @endforeach
                        <br>
                        <input type="text" name="orders_id" value="{{ $item->id }}">
                        <input type="submit" class="btn btn-success rounded-5 btn-lg text-capitalize" style="width:100%" value="Temukan Driver">
                    </form>
                    <form action="{{ route('orders.hapus', ['id' => $item->id]) }}" method="get">
                        @csrf
                        <button  class="btn btn-danger rounded-5 btn-lg mt-2 text-capitalize" style="width:100%">Batalkan Pesanan</button>

                    </form>
                    @endif
                    <a href="" class="btn btn-outline-white-50 rounded-5 btn-lg mt-2 text-capitalize" style="width:100%">Bantuan</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>