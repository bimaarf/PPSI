<div class="card">
    <div class="card-header text-center py-3">
        <h5 class="mb-0 text-center">
            <strong>Your Customer</strong>
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
                        <th scope="col">Name of the sender</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>
                        <th scope="col">Process</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($checkout as $item)
                        @if ($item->driver_id == Auth::user()->id)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->orders->armada }}</td>
                                <td>{{ $item->orders->jadwal }}</td>
                                @foreach ($checkout->where('orders_id', $item->id) as $check)

                                    <td class="mb-0 fw-normal"><a
                                            href="{{ route('chat.index', ['id' => $check->id]) }}"
                                            class="btn btn-outline-success">Chat</a>
                                    </td>
                                @endforeach
                                <td>{{ $item->orders->nama_pengirim }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <form action="{{ route('driver.delete', ['id'=>$item->orders->id, 'key' => $item->orders->key]) }}" method="put">
                                        <a href="{{ route('user.detail', ['id' => $item->orders->id, 'key' => $item->orders->key]) }}" class="btn btn-sm btn-info btn-sm m-0 py-1 px-2">View</a>
                                        @csrf
                                        @if ($item->orders->status == 1)
                                        <button class="btn btn-sm btn-danger btn-sm m-0 py-1 px-2">
                                            <i class="bi icon dripicons-view-list"></i>Delete
                                        </button>
                                        @endif
                                    </form>
                                </td>
                                <td>
                                    @if ($item->orders->status == 1)
                                    <form action="{{ route('driver.terima', ['id'=>$item->orders->id]) }}" method="post">
                                        @csrf
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                       
                                            <button type="submit" class=" btn btn-sm btn-primary btn-sm m-0 py-1 px-2  text-capitalize"
                                                data-toggle="tooltip">
                                                <div class="bi icon dripicons-trash"></div>Terima orderan
                                            </button>
                                        </div>
                                    </form>
                                    @endif
                                    @if ($item->orders->status == 2)
                                    <form action="{{ route('driver.jemput', ['id'=>$item->orders->id]) }}" method="post">
                                        @csrf
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                       
                                            <button type="submit" class=" btn btn-sm btn-success btn-sm m-0 py-1 px-2  text-capitalize"
                                                data-toggle="tooltip">
                                                <div class="bi icon dripicons-trash"></div>Jemput barang
                                            </button>
                                        </div>
                                    </form>
                                        
                                    @endif
                                    @if ($item->orders->status == 3)
                                    <form action="{{ route('driver.antar', ['id'=>$item->orders->id]) }}" method="post">
                                        @csrf
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                       
                                            <button type="submit" class=" btn btn-sm btn-secondary btn-sm m-0 py-1 px-2  text-capitalize"
                                                data-toggle="tooltip">
                                                <div class="bi icon dripicons-trash"></div>Antar Barang
                                            </button>
                                        </div>
                                    </form>
                                        
                                    @endif
                                    @if ($item->orders->status == 4)
                                    <form action="{{ route('driver.sampai', ['id'=>$item->orders->id]) }}" method="post">
                                        @csrf
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                       
                                            <button type="submit" class=" btn btn-sm btn-secondary btn-sm m-0 py-1 px-2  text-capitalize"
                                                data-toggle="tooltip">
                                                <div class="bi icon dripicons-trash"></div>Barang sudah sampai
                                            </button>
                                        </div>
                                    </form>
                                        
                                    @endif
                                    @if ($item->orders->status == 5)
                                    <h6 class="btn btn-success rounded-pill btn-sm m-0 py-1 px-2 text-capitalize">Menunggu Konfirmasi</h6>
                                        
                                    @endif
                                    @if ($item->orders->status == 6)
                                    <h6 class="btn btn-success rounded-pill btn-sm m-0 py-1 px-2 text-capitalize">Barang diterima</h6>
                                        
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
