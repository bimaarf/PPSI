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

                    @foreach ($orders->where('status', 'Finished') as $item)
                        @if ($item->user_id == Auth::user()->id)
                            <tr>
                                <td class="mb-0 fw-normal">{{ $i++ }}</td>
                                <td class="mb-0 fw-normal">{{ $item->armada }}</td>

                                <td class="mb-0 fw-normal">{{ $item->jadwal }}</td>
                                <td class="mb-0 fw-normal">
                                    <span class="btn btn-success rounded-9 text-capitalize py-0 px-1">Selesai</span>
                                </td>
                                <td class="mb-0 fw-normal">
                                    {{-- {{ route('orders.detail', ['id' => $item->id, 'key' => $item->key]) }} --}}
                                    <a href="" class="btn btn-success" data-mdb-toggle="modal"
                                        data-mdb-target="#pesanan-selesai{{ $item->id }}">
                                        <div class="bi icon dripicons-view-list"></div>Lihat
                                    </a>
                                </td>
                            </tr>
                        @endif
                        @include('user.modal.modal_selesai')
                    @endforeach


                </tbody>
            </table>
            {{ $orders->links() }} <small class="text-danger font-italic">*Pesanan tidak bisa dibatalkan jika sudah
                menekan toombol cari driver, Pastikan tidak ada kesalahan dalam memasukkan data!</small>
