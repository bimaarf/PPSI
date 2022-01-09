<div class="modal top fade" id="pesanan-masuk{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog modal-xl  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Info Pesanan</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-9">
                        @include('user.modal.elements.resi')
                    </div>
                    <div class="col-lg-3 border-start">
                        @if ($item->status == null)

                            <form id="form-find{{ $item->id }}"
                                action="{{ route('shipper.find_driver', ['id' => $item->id]) }}" method="get">
                                @csrf
                                @foreach ($driver->where('status_id', 1)->slice(0, $item->feed_m) as $drv)
                                    <input id="driver_id" type="text" name="driver_id[]" value="{{ $drv->id }}">

                                @endforeach
                                <br>
                                {{-- <input type="text" name="orders_id" value="{{ $item->id }}"> --}}
                                <button id="find" type="submit" onclick="finDriver({{ $item->id }})"
                                    class="btn btn-success rounded-5 btn-lg text-capitalize" style="width:100%">Temukan
                                    Driver</button>
                            </form>

                            <form id="form-hapus{{ $item->id }}"
                                action="{{ route('user.hapus_pesanan', ['id' => $item->id]) }}" method="get">
                                @csrf
                                <button onclick="hapusPesanan({{ $item->id }})" id="submit" type="submit"
                                    class="btn btn-danger rounded-5 btn-lg mt-2 text-capitalize submit"
                                    style="width:100%">Batalkan Pesanan</button>

                            </form>
                            @else 
                            <small class="text-danger">*Admin akan melakukan pengecakan untuk menentukan jumlah driver dan armada.</small>
                        @endif

                        <a href="#admin-help" class="btn btn-outline-white-50 rounded-5 btn-lg mt-2 text-capitalize"
                            style="width:100%">Bantuan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
