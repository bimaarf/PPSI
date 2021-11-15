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
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($checkout as $item)
                        @if ($item->driver_id == Auth::user()->id)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->orders->nama_pengirim }}</td>
                                <td>{{ $item->orders->jadwal }}</td>
                                <td class="mb-0 fw-normal">
                                    @if ($item->message == 'Finded')
                                        <span class="btn btn-info rounded-9 text-capitalize py-1 px-1">Belum diterima</span>
                                    @endif
                                    @if ($item->message == 'Verified')
                                        <span class="btn btn-warning rounded-9 text-capitalize py-1 px-1">Sedang diproses</span>
                                    @endif
                                    @if ($item->message == 'Finished')
                                        <span class="btn btn-success rounded-9 text-capitalize py-0 px-1">Selesai</span>
                                    @endif
                                </td>
                                <td><a href="" class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#detail{{ $item->id }}">
                                    <div class="bi icon dripicons-view-list"></div>Lihat
                                </a></td>
                                @include('driver.modal.modal_masuk')
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
