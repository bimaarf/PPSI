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
                        @if ($item->message == 'Verified')
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->orders->nama_pengirim }}</td>
                                <td>{{ $item->orders->jadwal }}</td>
                                <td><a href="" class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#detail{{ $item->id }}">
                                    <div class="bi icon dripicons-view-list"></div>Lihat
                                </a></td>
                                @include('driver.modal.modal_proses')
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
