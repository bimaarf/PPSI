
<table class="table table-striped" style="width:100%">
    <!-- Search form -->
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Pengirim</th>
            <th scope="col">Waktu</th>
            <th scope="col">Tujuan</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($checkout as $item)
            @if ($item->driver_id == Auth::user()->id && $item->message == 'Finished')
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->orders->nama_pengirim }}</td>
                    <td>{{ $item->orders->jadwal }}</td>
                    <td>
                        @foreach (json_decode($item->orders->tujuan) as $tujuan)
                            {{ $tujuan }},
                        @endforeach
                    </td>
                    <td class="mb-0 fw-normal">
                        @if ($item->message == 'Finded')
                            <span class="btn btn-info rounded-9 btn-sm text-capitalize py-1 px-1">Belum diterima</span>
                        @endif
                        @if ($item->message == 'Verified')
                            <span class="btn btn-warning btn-sm rounded-9 text-capitalize py-1 px-1">Sedang diproses</span>
                        @endif
                        @if ($item->message == 'Finished')
                            <span class="btn btn-success btn-sm rounded-9 text-capitalize py-0 px-1">Selesai</span>
                        @endif
                    </td>
                    <td><a href="" class="btn btn-sm btn-success" data-mdb-toggle="modal" data-mdb-target="#detail-selesai{{ $item->id }}">
                        <div class="bi icon dripicons-view-list"></div>Lihat
                    </a></td>
                    @include('driver.modal.modal_selesai')
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
