
    @foreach ($checkouts->where('orders_id', $orders->id) as $check)
        @if ($check->message != 'Finded')
            <div class="col-lg-6 mt-2">
                <div class="card">
                    <div class="card-header text-center">{{ $check->orders->jemput }}
                        @foreach (json_decode($check->orders->tujuan) as $info)
                            -{{ $info }}
                        @endforeach
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <div class="bs-vertical-wizard">

                           @include('orders.proses.timeline_modal')

                            {{-- @foreach ($tracking->where('checkout_id', $item->id) as $track)
                        
                    <div class="text-center mt-4 konfirmasi">
                        <button type="button" id="hulk" class="btn btn-success text-capitalize" data-mdb-toggle="modal" data-mdb-target="#exampleModal{{ $track->id }}"><i class="fa fa-comment text-white"></i> Hubungi Driver</button>
                    </div>
                    @include('orders.modal.chattings')
                    @endforeach --}}
                        </div>
                    </div>

                </div>
            </div>
        @endif
        @if ($check->message == 'Finded')
            <div class="col-lg-6 mt-2">
                <div class="card">
                    <div class="card-header text-center">{{ $item->jemput }}
                        @foreach (json_decode($check->orders->tujuan) as $info)
                            -{{ $info }}
                        @endforeach
                    </div>
                    <div class="card-body">
                        <div class="bs-vertical-wizard">
                            <ul>
                                <li>
                                    <a href="#">Driver belum menerima orderan.<i class="desc"></i>
                                        <span class="desc">Mohon tunggu, kami akan carikan driver lain jika
                                            driver
                                            saat menolak orderan</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
