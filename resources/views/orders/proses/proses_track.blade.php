
@foreach ($checkout->where('orders_id', $orders->id) as $item)
    @if ($item->message != 'Finded')
        <div class="col-lg-6 mt-2">
            <div class="card">
                @include('orders.proses.proses')
            </div>
        </div>
    @endif
    @if ($item->message == 'Finded')
        <div class="col-lg-6 mt-2">
            <div class="card">
                <div class="card-header text-center">{{ $orders->jemput }}
                    @foreach (json_decode($item->orders->tujuan) as $info)
                        -{{ $info }}
                    @endforeach
                </div>
                <div class="card-body">
                    <div class="bs-vertical-wizard">
                        <ul>
                            <li>
                                <a href="#">Driver belum menerima orderan.<i class="desc"></i>
                                    <span class="desc">Mohon tunggu, kami akan carikan driver lain jika driver
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
    
    