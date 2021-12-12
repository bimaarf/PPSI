<div class="card">
    <div class="card-header text-center py-3">
        <h5 class="mb-0 text-center">
            <strong>Pesanan Anda</strong>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover text-nowrap">
                <!-- Search form -->
                <thead>

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Armada</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($orders as $item)
                        @if ($item->user_id == Auth::user()->id)
                            <tr>
                                <td class="mb-0 fw-normal">{{ $i++ }}</td>
                                <td class="mb-0 fw-normal">{{ $item->armada }}</td>

                                <td class="mb-0 fw-normal">{{ $item->jadwal }}</td>
                                <td class="mb-0 fw-normal">
                                    <span class="btn btn-danger rounded-9 text-capitalize py-1 px-1">Dibatalkan</span>
                                </td>
                                <td class="mb-0 fw-normal">
                                        {{-- {{ route('orders.detail', ['id' => $item->id, 'key' => $item->key]) }} --}}
                                        <a href="" class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#pesanan-batal{{ $item->id }}">
                                            <div class="bi icon dripicons-view-list"></div>Lihat
                                        </a>
                                </td>
                            </tr>
                        @endif
                        @include('user.modal.modal_batal')
                    @endforeach


                </tbody>
            </table>
        </div>
        {{ $orders->links() }} <small class="text-danger font-italic">*Pesanan tidak bisa dibatalkan jika sudah menekan toombol cari driver, Pastikan tidak ada kesalahan dalam memasukkan data!</small>
    </div>
</div>
