@extends('layouts.backend.main_login')
@section('daftar-shipper', 'active')
@section('content')
<div class="container pt-4">
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
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0 text-center">
                <strong>Daftar Pengguna</strong>
            </h5>
            {{-- <div class="row"> --}}
            <div class="fa-pull-right" style="width: 300px">
                <form class="d-none d-md-flex input-group w-auto my-auto" action="{{ route('admin.table_driver') }}">
                    <input type="text" value="{{ request('search') }}" class="form-control" name="search" placeholder='Cari username'
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari username'">
                    <!-- <span class="input-group-text border-0"><i class="fas fa-search"></i></span> -->
                    <button class="btn btn-primary" type="su bmit"><i class="fas fa-search"></i></button>
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
                            <th>Status</th>
                            <th>xyz</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            @if ($item->hasRole('shipper'))
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->name }}</td>
                                @if ($item->status_id == 1)
                                <td><a href="" class="btn btn-success rounded-9 text-capitalize">Aktif</a></td>
                                @endif
                                @if ($item->status_id == 2)
                                <td><a href="" class="btn btn-danger rounded-9 text-capitalize">Tidak Aktif</a></td>
                                @endif
                                @if ($item->status_id == 3)
                                <td><a href="" class="btn btn-warning rounded-9 text-capitalize">Sibuk</a></td>
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
                                <div class="modal-dialog modal-lg  modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail Pengguna</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.edit_user', ['id'=>$item->id]) }}" method="POST">
                                                @csrf
                                                <div class="row mt-2">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="name">Username</label>
                                                            <input type="text" id="name" class="form-control"
                                                                value="{{ $item->name }}" disabled>
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <label for="telp">No. Telepon</label>
                                                            <input type="text" class="form-control" value="{{ $item->telp }}" disabled>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-3">
                                                                <img src="{{ asset('assets/icon/Shipper.svg') }}" width="100" alt="">
                                                            </div>
                                                            <div class="form-group col-9">
                                                                <label for="status_id">Status</label>
                                                                <select name="status_id" id="status_id" class="form-control">
                                                                    @foreach ($users_status as $status)
                                                                        <option value="{{ $status->id }}"{{($item->status_id==$status->id) ? 'selected' : ''}}>{{ $status->status }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="text" id="email" class="form-control"
                                                                value="{{ $item->email }}" disabled>
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <label for="alamat">Alamat</label>
                                                            <textarea name="alamat" class="form-control" id="alamat" rows="10" disabled>{{ $item->alamat }}</textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    
    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="https://wa.me/{{ $item->telp }}?text=Hallo {{ $item->name }}," target="__blank" class="btn btn-success text-capitalize"><i
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
                            @endif
                        @endforeach
                        
                    </div>
                </div>
            </tbody>
        </table>
    </div>
    {{ $users->links() }}
</div>
@endsection