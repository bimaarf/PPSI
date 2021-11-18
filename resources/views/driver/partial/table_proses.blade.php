<div class="card">
    <div class="card-header text-center py-3">
        <h5 class="mb-0 text-center">
            <strong>Pesanan Masuk</strong>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <!-- Search form -->
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pengirim</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($checkout->where('driver_id', Auth::user()->id) as $item)
                    @foreach ($trackings->where('checkout_id', $item->id) as $track)
                        @include('orders.modal.chattings')
                        @if ($item->message == 'Verified')
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->orders->nama_pengirim }}</td>
                                <td>{{ $item->orders->jadwal }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-success text-capitalize dropdown-toggle" data-mdb-toggle="dropdown" aria-expanded="false">Detail Pengiriman</button>
                                    
                                    
                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <li>
                                            <a class="dropdown-item" data-mdb-toggle="modal" data-mdb-target="#detail{{ $item->id }}">
                                            <div class="bi icon dripicons-view-list"></div>Lihat
                                            </a>
                                        </li>
                                        <li><a class="dropdown-item" href="#" onclick="scrollBot()" data-mdb-toggle="modal" data-mdb-target="#exampleModal{{ $track->id }}">Hubungi Pengirim</a></li>
                                    </ul>
                                    </div>
                            </td>
                                @include('driver.modal.modal_proses')
                            </tr>
                        @endif

                    @endforeach

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
