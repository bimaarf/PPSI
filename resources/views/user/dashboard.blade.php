@extends('layouts.backend.main_login')
@section('dashboard', 'active')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success text-center">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
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
                            <th scope="col">Driver Status</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                            @if ($item->user_id == Auth::user()->id)
                            <tr>
                                <td class="mb-0 fw-normal">{{ $item->id }}</td>
                                <td class="mb-0 fw-normal">{{ $item->armada }}</td>

                                <td class="mb-0 fw-normal">{{ $item->jadwal }}</td>

                                @if ($item->status == null)


                                    <td class="mb-0 fw-normal"><button
                                            class="btn btn-danger rounded-pill btn-sm m-0 py-1 px-2 text-capitalize">Not
                                            occupied <i class="fas fa-times red-text"></i></button></td>
                                @endif
                                @if ($item->status == 1)
                                <td class="mb-0 fw-normal"><button
                                    class="btn btn-success rounded-pill btn-sm m-0 py-1 px-2 text-capitalize">
                                    occupied <i class="fas fa-times red-text"></i></button></td>

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
                                        <a href="{{ route('user.hapus', ['id' => $item->id, 'key' => $item->key]) }}"
                                            class=" btn btn-sm btn-danger btn-sm m-0 py-1 px-2" data-toggle="tooltip">
                                            <div class="bi icon dripicons-trash"></div>Delete
                                        </a>
                                    </div>

                                </td>
                            </tr>
                                
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{ $orders->links() }} <small class="text-danger"><i>*You can change this order if the driver status is non
                    accoupied.</i></small>
        </div>
    </div>
@endsection
