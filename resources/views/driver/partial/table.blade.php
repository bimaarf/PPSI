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

                                        @if ($track->driver_id == Auth::user()->id && $track->checkout_id == $item->id && $track->status == 1)
                                            <td class="mb-0 fw-normal"><a
                                                    href="{{ route('chat.index', ['id' => $track->id]) }}"
                                                    class="btn btn-outline-success ">Chat</a>
                                            </td>
                                        @endif

                                    @endforeach
                                    @if ($item->message == 'Finded')
                                        <td class="Findoff"><button class="btn btn-outline-primary" type="button"
                                                disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                            </button></td>
                                    @endif
                                    <td>{{ $item->orders->nama_pengirim }}</td>
                                    {{-- ganti driver --}}
                                    <td>
                                        <form action="{{ route('driver.update', ['id' => $item->id]) }}"
                                            method="POST">
                                            @csrf
                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                <a href="{{ route('orders.detail', ['id' => $item->orders->id, 'key' => $item->orders->key]) }}"
                                                    class="btn btn-outline-info">View</a>
                                                @if ($item->orders->status == 1)
                                                    <input type="submit" class="btn btn-outline-danger" value="Tolak">

                                                @endif
                                            </div>

                                        </form>

                            </td>
                            <td>
                                <form action="{{ route('driver.terima', ['id' => $item->id]) }}"
                                    class="Finded{{ $item->id }}" method="post">
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
                                    @if ($track->status == 1 && $track->driver_id == Auth::user()->id && $track->checkout_id == $item->id)
                                        <style>
                                            .Finded{{ $item->id }} {
                                                display: none;
                                            }

                                        </style>
                                        <form action="{{ route('driver.jemput', ['id' => $track->id]) }}"
                                            method="post" class="jemput{{ $item->id }}">
                                            @csrf
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <input type="hidden" value="{{ $item->id }}" name="checkout_id">
                                                <button type="submit" class=" btn btn-success text-capitalize"
                                                    data-toggle="tooltip">
                                                    <div class="bi icon dripicons-trash"></div>Jemput barang
                                                </button>
                                            </div>
                                        </form>



                                    @endif
                                    @if ($track->status == 2 && $track->driver_id == Auth::user()->id && $track->checkout_id == $item->id)
                                        <style>
                                            .Finded{{ $item->id }} {
                                                display: none;
                                            }
                                            .jemput{{ $item->id }} {
                                                display: none;
                                            }

                                        </style>
                                        <form action="{{ route('driver.antar', ['id' => $item->id]) }}"
                                            method="post" class="antar{{ $item->id }}">
                                            @csrf
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <input type="hidden" value="{{ $item->id }}" name="checkout_id">
                                                <button type="submit" class=" btn btn-secondary text-capitalize"
                                                    data-toggle="tooltip">
                                                    <div class="bi icon dripicons-trash"></div>Antar Barang
                                                </button>
                                            </div>
                                        </form>
                                    @endif
                                    @if ($track->status == 3 && $track->driver_id == Auth::user()->id && $track->checkout_id == $item->id)
                                        <style>
                                            .Finded{{ $item->id }} {
                                                display: none;
                                            }
                                            .antar{{ $item->id }} {
                                                display: none;
                                            }

                                        </style>

                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @if ($track->id)
                                                
                                            @endif
                                            <button type='button' class='btn btn-primary' data-mdb-toggle='modal'
                                                data-mdb-target='#exampleModal{{ $track->id }}'> Konfirmasi
                                            </button>
                                            {{-- <button type="submit" class=" btn btn-secondary text-capitalize"
                                                    data-toggle="tooltip">
                                                  
                                                    <div class="bi icon dripicons-trash"></div>Barang sudah
                                                    sampai
                                                </button> --}}
                                        </div>
                                        {{-- modal status == 3 --}}
                                        <!-- Modal -->
                                        <div class="modal top fade" id="exampleModal{{ $track->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true"
                                            data-mdb-backdrop="static" data-mdb-keyboard="true">
                                            <div class="modal-dialog modal-lg  modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi
                                                            Pesanan
                                                        </h5>
                                                        <button type="button" class="btn-close"
                                                            data-mdb-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- ALGORITMA --}}
                                                        
                                                        {{--  --}}
                                                        @foreach ($trackings->where('checkout_id', $item->id) as $valid)
                                                            @if ($valid->status == 5)
                                                            <div class="bs-vertical-wizard row">
                                                                <ul class="col-lg-10">
                                                                    <li class="complete">
                                                                        <a href="#"><b class="text-capitalize">{{ $valid->alamat }}</b><i class="ico fa fa-check ico-green"></i>
                                                                            <span class="desc">Paket telah sampai di {{ $valid->alamat }} <i class="text-success">Sedang menunggu konfirmasi dari shipper.</i></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                                
                                                            @endif
                                                        @endforeach
                                                        
                                                            {{-- @if ($trc->alamat == null && $trc->status == 4) --}}
                                                                @foreach ($trackings->where('checkout_id', $item->id) as $tr)
                                                                @if ($tr->status == 4)
                                                                
                                                                <form action="{{ route('driver.sampai', ['id' => $tr->id]) }}" method="post" >
                                                                    @csrf
                                                                    {{-- alamat --}}

                                                                        <div class="bs-vertical-wizard row">
                                                                            <ul class=" col-lg-10">
                                                                                <li class="locked">
                                                                                    <a href="#"><b class="text-capitalize">{{ $tr->alamat }}</b><i class="ico fa fa-lock ico-muted"></i>
                                                                                        <span class="desc">Tekan konfirmasi jika paket sudah sampai di {{ $tr->alamat }}</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul class="col-lg-2">
                                                                                <input type="hidden" value="{{ $tr->alamat }}" name="alamat">
                                                                                <button type="submit" class="btn btn-success mt-2 "> Konfirmasi</button>
                                                                            </ul>
                                                                        </div>
                                                                        
                                                                    

                                                    
                                                        
                                                                    @endif
                                                                    
                                                                </form>
                                                                @endforeach
                                                            {{-- @endif --}}
                                                        
                                                               
                                                        {{-- end ALGORITMA --}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-mdb-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="button" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end modal status == 3 --}}
                                    @endif
                                    {{-- @if ($track->status == 4 && $track->driver_id == Auth::user()->id && $track->checkout_id == $item->id)
                                        <style>
                                            .Finded{{ $item->id }} {
                                                display: none;
                                            }

                                        </style>
                                        <h6 class="btn btn-success rounded-pill text-capitalize">
                                            Menunggu Konfirmasi</h6>

                                    @endif --}}
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
