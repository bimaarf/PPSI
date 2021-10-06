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


                        <th scope="col">Driver Total</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($feed_manager as $item)
                        @if ($item->feed_id == Auth::user()->id)
                            <tr>
                                <td class="mb-0 fw-normal">{{ $loop->iteration }}</td>
                                <td class="mb-0 fw-normal">{{ $item->orders->armada }}</td>

                                <td class="mb-0 fw-normal">{{ $item->orders->jadwal }}</td>

                                <td class="mb-0 fw-normal">{{ $item->created_at }}</td>
                                <td class="mb-0 fw-normal">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('user.detail', ['id' => $item->orders->id, 'key' => $item->orders->key]) }}"
                                            class="btn btn-sm btn-info btn-sm m-0 py-1 px-2">
                                            <div class="bi icon dripicons-view-list"></div>View
                                        </a>
                                        
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
