@extends('layouts.backend.main_login')
@section('dashboard', 'active')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 text-center">
                <strong>Daftar Pengguna</strong>
            </h5>
            {{-- <div class="row"> --}}
            <div class="fa-pull-right" style="width: 300px">
                <form class="d-none d-md-flex input-group w-auto my-auto" action="{{ route('admin.index') }}">
                    <input type="text" class="form-control" name="search" placeholder='Cari pengguna'
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari pengguna'">
                    <!-- <span class="input-group-text border-0"><i class="fas fa-search"></i></span> -->
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            {{-- </div> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>xyz</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $rUser)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rUser->name }}</td>
                                <td>
                                    @if ($rUser->hasRole('admin'))
                                        Admin
                                    @endif
                                    @if ($rUser->hasRole('driver'))
                                        Driver
                                    @endif
                                    @if ($rUser->hasRole('shipper'))
                                        Shipper
                                    @endif

                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary" data-mdb-toggle="modal"
                                            data-mdb-target="#exampleModal{{ $rUser->id }}">Lihat</button>
                                    </div>
                                </td>
                            </tr>
                            {{-- Popup detail --}}

                            <!-- Modal -->
                            <div class="modal top fade" id="exampleModal{{ $rUser->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static"
                                data-mdb-keyboard="true">
                                <div class="modal-dialog modal-lg  modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Info Pengguna</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="">
                                                <div class="row">
                                                    <div class="form-group col-lg-6">
                                                        <label for="name">Username</label>
                                                        <input type="text" id="name" class="form-control"
                                                            value="{{ $rUser->name }}" disabled>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label for="email">Email</label>
                                                        <input type="text" id="email" class="form-control"
                                                            value="{{ $rUser->email }}" disabled>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-lg-6">
                                                        <label for="role"></label>
                                                        <select id="role" class="form-control">
                                                            <option value="">-- Role --</option>
                                                            <option value="">Admin</option>
                                                            <option value="">Driver</option>
                                                            <option value="">Shiper</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success text-capitalize"><i
                                                    class="fab fa-whatsapp text-white"></i>&nbsp;Whatsapp</button>
                                            <button type="button" class="btn btn-secondary text-capitalize"
                                                data-mdb-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="button" class="btn btn-primary text-capitalize">Save
                                                changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End Popup detail --}}
                        @endforeach

            </div>
        </div>
        </tbody>
        </table>
    </div>
    </div>
    </div>
@endsection
