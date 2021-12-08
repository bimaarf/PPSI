<div class="card">
    <div class="card-header text-center py-3">
        <h5 class="mb-0 text-center">
            <strong>Pesanan Saya</strong>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped text-nowrap">
                <!-- Search form -->
                <thead>

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Armada</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders->where('status', 'Process') as $item)
                        @if ($item->user_id == Auth::user()->id)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->armada }}</td>
                                <td>{{ $item->jadwal }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="" class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#proses{{ $item->id }}">
                                            <div class="bi icon dripicons-view-list"></div>Lihat
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @include('user.modal.modal_proses')
                        @endif
                        @foreach ($checkouts->where('orders_id', $item->id) as $check)
                        
                            @foreach ($tracking->where('checkout_id', $check->id) as $track)
                            <button type="button" class="btn btn-success text-center" data-mdb-dismiss="modal" data-mdb-toggle="modal" onclick="scrollBot()" data-mdb-target="#exampleModal{{ $track->id }}">
                                <i class="fa fa-comment"></i> Hubungi Driver{{ $track->id }}
                            </button>
                                @include('orders.modal.chattings')
                                
                            @endforeach

                         
                        @endforeach
                    @endforeach


                </tbody>
            </table>
        </div>
        {{ $orders->links() }}
    </div>
</div>