
<table class="table table-hover">
    <!-- Search form -->
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Pengirim</th>
            <th scope="col">Tujuan</th>
            <th scope="col">Waktu</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($checkout->where('driver_id', Auth::user()->id) as $item)
            @foreach ($trackings->where('checkout_id', $item->id) as $track)
                @include('orders.modal.chattings')
            @endforeach

                @if ($item->message == 'Verified')
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td class="text-capitalize">{{ $item->orders->nama_pengirim }}</td>
                        <td>
                            <ol>
                                @foreach (json_decode($item->orders->tujuan) as $tujuan)
                                    <li>{{ $tujuan }}</li>
                                @endforeach
                            </ol>
                        </td>
                        <td>{{ $item->orders->jadwal }}</td>
                        <td>

                            <div class="btn-group">
                                <a class="btn btn-info" data-mdb-toggle="modal"
                                data-mdb-target="#detail-proses{{ $item->id }}">
                                <div class="bi icon dripicons-view-list"></div>Lihat
                            </a>
                            <a class="btn btn-success" href="#" onclick="scrollBot({{ $track->id }})" data-mdb-toggle="modal"
                                data-mdb-target="#chatting{{ $track->id }}">Hubungi Pengirim</a>
                            </div>
                        </td>
                        @include('driver.modal.modal_proses')
                    </tr>
                @endif


        @endforeach
    </tbody>
</table>
