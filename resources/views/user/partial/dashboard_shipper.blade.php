<div class="card">
    <div class="card-header text-center py-3">
        <h5 class="mb-0 text-center">
            <strong>Your Order</strong>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover text-nowrap">
                <!-- Search form -->
                <thead>

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fleet</th>
                        <th scope="col">Schedule</th>

                        <th scope="col">Chatting</th>

                        <th scope="col">Driver Status</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($orders as $item)
                        @if ($item->user_id == Auth::user()->id)
                            <tr>
                                <td class="mb-0 fw-normal">{{ $loop->iteration }}</td>
                                <td class="mb-0 fw-normal">{{ $item->armada }}</td>

                                <td class="mb-0 fw-normal">{{ $item->jadwal }}</td>
                                @foreach ($checkout->where('orders_id', $item->id) as $check)

                                    @if ($check->orders->status == 2)
                                    <td class="mb-0 fw-normal"><a
                                        href="{{ route('chat.index', ['id' => $check->id]) }}"
                                        class="btn btn-outline-success">Chat</a>
                                </td>
                                    @else
                                        <td></td>
                                    @endif
                                @endforeach

                                @if ($item->status == null)
                                <td></td>
                                    <td class="mb-0 fw-normal"><button
                                            class="btn btn-danger rounded-pill btn-sm m-0 py-1 px-2 text-capitalize">Belum
                                            ada </button></td>
                                @endif
                                @if ($item->status == 1)
                                    <td class="mb-0 fw-normal"><button
                                            class="btn btn-success rounded-pill btn-sm m-0 py-1 px-2 text-capitalize">
                                            Sedang mencari driver </button></td>

                                @endif
                                @if ($item->status == 2)
                                    <td class="mb-0 fw-normal"><button
                                            class="btn btn-success rounded-pill btn-sm m-0 py-1 px-2 text-capitalize">
                                            Driver ditemukan </button></td>

                                @endif
                                @if ($item->status == 3)
                                    <td class="mb-0 fw-normal"><button
                                            class="btn btn-success rounded-pill btn-sm m-0 py-1 px-2 text-capitalize">
                                            Barang akan dijemput </button></td>

                                @endif
                                @if ($item->status == 4)
                                    <td class="mb-0 fw-normal"><button
                                            class="btn btn-success rounded-pill btn-sm m-0 py-1 px-2 text-capitalize">
                                            Barang dalam proses antar </button></td>

                                @endif
                                @if ($item->status == 5)
                                    <td class="mb-0 fw-normal">
                                        <p>Barang sudah sampai</p>
                                        <form action="{{ route('shipper.konfirmasi', ['id' => $item->id]) }}"
                                            method="post">
                                            @csrf
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="submit"
                                                    class=" btn btn-sm btn-secondary btn-sm m-0 py-1 px-2  text-capitalize"
                                                    data-toggle="tooltip">
                                                    <div class="bi icon dripicons-trash"></div>Konfirmasi pesanan
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                @endif
                                @if ($item->status == 6)
                                    <td class="mb-0 fw-normal"><button
                                            class="btn btn-success rounded-pill btn-sm m-0 py-1 px-2 text-capitalize">
                                            Barang diterima </button></td>

                                @endif
                                {{-- @if ($item->orders_id === null)

                                    <td class="mb-0 fw-normal">Not occupied <i class="fas fa-times red-text"></i></td>

                                @endif --}}


                                <td class="mb-0 fw-normal">{{ $item->created_at }}</td>
                                <td class="mb-0 fw-normal">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('user.detail', ['id' => $item->id, 'key' => $item->key]) }}"
                                            class="btn btn-sm btn-info btn-sm m-0 py-1 px-2">
                                            <div class="bi icon dripicons-view-list"></div>View
                                        </a>
                                        @if ($item->status == null)
                                            <a href="{{ route('user.hapus', ['id' => $item->id, 'key' => $item->key]) }}"
                                                class=" btn btn-sm btn-danger btn-sm m-0 py-1 px-2"
                                                data-toggle="tooltip">
                                                <div class="bi icon dripicons-trash"></div>Delete
                                            </a>

                                        @endif
                                    </div>

                                </td>
                            </tr>

                        @endif
                    @endforeach


                </tbody>
            </table>
        </div>
        {{ $orders->links() }} <small class="text-danger"><i>*You can change this order if the driver status is not
                accoupied.</i></small>
    </div>
</div>
