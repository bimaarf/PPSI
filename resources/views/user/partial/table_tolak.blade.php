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

                    @foreach ($orders->where('status', 'Canceled') as $item)
                        @if ($item->user_id == Auth::user()->id)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->armada }}</td>
                                <td>{{ $item->jadwal }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="" class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#exampleModal{{ $item->id }}">
                                            <div class="bi icon dripicons-view-list"></div>Lihat
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @include('user.modal.modal_tolak')
                        @endif
                    @endforeach


                </tbody>
            </table>
        {{ $orders->links() }} <small class="text-danger"><i>*You can change this order if the driver status is not
                accoupied.</i></small>
