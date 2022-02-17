@extends('admin.main')
@section('daftar-admin', 'active')
@section('content')
    <div class="card rounded">
        <div class="card-body">
            <div class="fs-5">
                <i class="fas fa-home text-primary"></i>&emsp;<b>Beranda&emsp;/&emsp;Daftar Admin</b>
                <form class="d-none d-md-flex input-group w-auto my-auto fa-pull-right"
                    action="{{ route('admin.table_admin') }}">
                    <input type="text" value="{{ request('search') }}" class="form-control" name="search"
                        placeholder='Cari username' onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Cari username'">
                    <!-- <span class="input-group-text border-0"><i class="fas fa-search"></i></span> -->
                    <button class="btn btn-primary" type="su bmit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="mt-2">
        <div class="card rounded mt-2">
            <div class="card-header">
                <h5 class="mb-0 text-center">
                    <strong>Daftar Admin</strong>
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="selectedColumn results" class="table table-striped table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">#</th>
                                <th class="th-sm" onclick="sortTable(0)">Username</th>
                                <th class="th-sm">Status</th>
                                <th class="th-sm">xyz</th>
                            </tr>
                        </thead>
                        <tbody id="myTable2">
                            @foreach ($users as $item)
                                <tr id="rowUpdate">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    @if ($item->status_id == 1)
                                        <td><a href="" class="btn btn-success btn-sm rounded-6 text-capitalize">Aktif</a>
                                        </td>
                                    @endif
                                    @if ($item->status_id == 2)
                                        <td><a href="" class="btn btn-danger btn-sm rounded-6 text-capitalize">Tidak
                                                Aktif</a></td>
                                    @endif
                                    @if ($item->status_id == 3)
                                        <td><a href="" class="btn btn-warning btn-sm rounded-6 text-capitalize">Sibuk</a>
                                        </td>
                                    @endif

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary" data-mdb-toggle="modal"
                                                data-mdb-target="#exampleModal{{ $item->id }}">Lihat</button>
                                        </div>
                                    </td>

                                </tr>

                                {{-- Popup detail --}}

                                <!-- Modal -->
                                <div class="modal top fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static"
                                    data-mdb-keyboard="true">
                                    <div class="modal-dialog modal-xl  modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Pengguna</h5>
                                                <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.edit_admin', ['id' => $item->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="row mt-2">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="name">Username</label>
                                                                <input type="text" id="name" class="form-control"
                                                                    value="{{ $item->name }}" disabled>
                                                            </div>
                                                            <div class="form-group mt-2">
                                                                <label for="telp">No. Telepon</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $item->telp }}" disabled>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col-3">
                                                                    <img src="{{ asset('assets/icon/Driver.svg') }}"
                                                                        width="100" alt="">
                                                                </div>
                                                                <div class="form-group col-9">
                                                                    <label for="status_id">Status</label>
                                                                    <select name="status_id" id="status_id"
                                                                        class="form-control">
                                                                        @foreach ($users_status as $status)
                                                                            <option value="{{ $status->id }}"
                                                                                {{ $item->status_id == $status->id ? 'selected' : '' }}>
                                                                                {{ $status->status }}</option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="text" id="email" class="form-control"
                                                                    value="{{ $item->email }}" disabled>
                                                            </div>
                                                            <div class="form-group mt-2">
                                                                <label for="alamat">Alamat</label>
                                                                <textarea name="alamat" class="form-control" id="alamat"
                                                                    rows="10" disabled>{{ $item->alamat }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            @foreach ($permissions as $permission)
                                                                <div class="form-check form-switch mt-2">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        name="permissions[]" id="{{ $permission->name }}"
                                                                        @if ($item->permissions->contains($permission->id)) checked='checked' @endif
                                                                        value="{{ $permission->id }}">
                                                                    <label class="form-check-label"
                                                                        for="{{ $permission->name }}">
                                                                        {{ $permission->display_name }} </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="https://wa.me/{{ $item->telp }}?text=Hallo {{ $item->name }},"
                                                    target="__blank" class="btn btn-success text-capitalize"><i
                                                        class="fab fa-whatsapp text-white"></i>&nbsp;Whatsapp</a>
                                                <button type="button" class="btn btn-secondary text-capitalize"
                                                    data-mdb-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary text-capitalize">Save
                                                    changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Popup detail --}}
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $users->links() }}
    </div>
@endsection
