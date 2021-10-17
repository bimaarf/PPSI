<div class="card">
    <div class="card-header text-center py-3">
        <h5 class="mb-0 text-center">
            <strong>Your Customer</strong>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <!-- Search form -->
                <thead>

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fleet</th>
                        <th scope="col">Schedule</th>
                        <th scope="col">Chatting</th>
                        <th scope="col">Name of the sender</th>
                        <th scope="col">Action</th>
                        <th scope="col">Process</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($checkout as $item)
                        @if ($item->driver_id != '')
                            @foreach (explode(",", str_replace(array('[', '"', ']'), ' ', $item->driver_id)) as $info)
                            @if (Auth::user()->id == $info)
                                {{-- content --}}

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->orders->armada }}</td>
                                    <td>{{ $item->orders->jadwal }}</td>

                                        @foreach ($trackings->where('checkout_id', $item->id) as $track)
                                        
                                        @if ($track->driver_id == Auth::user()->id)
                                        <td class="mb-0 fw-normal"><a
                                            href="{{ route('chat.index', ['id' => $track->id]) }}"
                                            class="btn btn-outline-success ">Chat</a>
                                        </td>
                                        @endif
                                       
                                        @endforeach
                                        <td></td>
                                    {{-- ganti driver --}}
                                    <td>{{ $item->orders->nama_pengirim }}</td>
                                    <td>
                                        <form action="{{ route('driver.update', ['id' => $item->id]) }}"
                                            method="POST">
                                            @csrf
                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                <a href="{{ route('user.detail', ['id' => $item->orders->id, 'key' => $item->orders->key]) }}"
                                                    class="btn btn-outline-info">View</a>
                                                @if ($item->orders->status == 1)
                                                    <input type="submit" class="btn btn-outline-danger" value="Tolak">

                                                @endif
                                            </div>

                                            <input type="hidden" name="orders_id" value="{{ $item->orders->id }}">
                                            @foreach (explode(",", str_replace(array('[', '"', ']'), ' ',
                                            $item->driver_id)) as $info)
                                            @if ($info != Auth::user()->id)
                                                @foreach ($driver->slice(0, 1) as $dr)
                                                    @if ($dr->user_id != Auth::user()->id && $dr->user_id != $info)
                                                        <input type="hidden" name="driver_id[]"
                                                            value="{{ $dr->user_id }}">
                                                    @endif
                                                @endforeach
                                                <input type="hidden" name="driver_id[]" value="{{ $info }}">
                                            @endif
                            @endforeach
                            </form>
                            </td>
                            <td>


                                {{-- @if ($item->message == 'Finded')
                                    

                                @endif --}}
                                <form action="{{ route('driver.terima', ['id' => $item->id]) }}" method="post"
                                    class="Finded">
                                    @csrf
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                        <button type="submit" class=" btn btn-primary  text-capitalize"
                                            data-toggle="tooltip">
                                            <div class="bi icon dripicons-trash"></div>Terima
                                            orderan
                                        </button>
                                    </div>
                                </form>
                                @foreach ($trackings as $track)
                                    @if ($track->status == 1 && $track->driver_id == Auth::user()->id)
                                        <style>
                                            .Finded {
                                                display: none;
                                            }

                                        </style>
                                        <form action="{{ route('driver.jemput', ['id' => $track->id]) }}"
                                            method="post">
                                            @csrf
                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                <button type="submit" class=" btn btn-success text-capitalize"
                                                    data-toggle="tooltip">
                                                    <div class="bi icon dripicons-trash"></div>Jemput barang
                                                </button>
                                            </div>
                                        </form>
                                  
                                   

                                    @endif
                                    @if ($track->status == 2 && $track->driver_id == Auth::user()->id)
                                    <style>
                                        .Finded {
                                            display: none;
                                        }

                                    </style>
                                        <form action="{{ route('driver.antar', ['id' => $track->id]) }}"
                                            method="post">
                                            @csrf
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="submit" class=" btn btn-secondary text-capitalize"
                                                    data-toggle="tooltip">
                                                    <div class="bi icon dripicons-trash"></div>Antar Barang
                                                </button>
                                            </div>
                                        </form>
                                    @endif
                                    @if ($track->status == 3 && $track->driver_id == Auth::user()->id)
                                    <style>
                                        .Finded {
                                            display: none;
                                        }

                                    </style>
                                        <form action="{{ route('driver.sampai', ['id' => $track->id]) }}"
                                            method="post">
                                            @csrf
                                            <div class="btn-group" role="group" aria-label="Basic example">
    
                                                <button type="submit" class=" btn btn-secondary text-capitalize"
                                                    data-toggle="tooltip">
                                                    <div class="bi icon dripicons-trash"></div>Barang sudah
                                                    sampai
                                                </button>
                                            </div>
                                        </form>
                                    @endif
                                    @if ($track->status == 4 && $track->driver_id == Auth::user()->id)
                                    <style>
                                        .Finded {
                                            display: none;
                                        }
    
                                    </style>
                                        <h6 class="btn btn-success rounded-pill text-capitalize">
                                            Menunggu Konfirmasi</h6>
    
                                    @endif
                                @endforeach

                                @if ($item->orders->status == 6)
                                    <h6 class="btn btn-success rounded-pill text-capitalize">
                                        Barang diterima</h6>
                                @endif
                            </td>
                            </tr>
                        @endif
                    @endforeach
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
