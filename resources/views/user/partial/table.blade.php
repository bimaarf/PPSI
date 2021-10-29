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
                        <th scope="col">Armada</th>
                        <th scope="col">Waktu</th>

                        <th scope="col">Lacak</th>

                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($orders as $item)
                        @if ($item->user_id == Auth::user()->id)
                            <tr>
                                <td class="mb-0 fw-normal">{{ $loop->iteration }}</td>
                                <td class="mb-0 fw-normal">{{ $item->armada }}</td>

                                <td class="mb-0 fw-normal">{{ $item->jadwal }}</td>
                                @foreach ($checkout->where('orders_id', $item->id)->slice(0,1) as $check)

                                    @if ($check->orders->status != null && $check->orders->status == 2)
                                    <td class="mb-0 fw-normal">
                                        <a href="{{ route('orders.tracking', ['id'=>$check->id]) }}" class="btn btn-outline-success" >Status</a>
                                    </td>
                                    @else
                                        <td><button class="btn btn-outline-primary" type="button" disabled>
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                          </button></td>
                                    @endif
                                @endforeach
                                @if ($item->status == null)
                                    <td></td>
                                @endif
                                <td class="mb-0 fw-normal">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('orders.detail', ['id' => $item->id, 'key' => $item->key]) }}"
                                            class="btn btn-outline-info">
                                            <div class="bi icon dripicons-view-list"></div>View
                                        </a>
                                        @if ($item->status == null)
                                            <a href="{{ route('orders.hapus', ['id' => $item->id, 'key' => $item->key]) }}"
                                                class=" btn btn-outline-danger"
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
