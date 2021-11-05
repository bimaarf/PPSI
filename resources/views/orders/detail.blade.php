@extends('layouts.backend.main_login')
@section('detail', 'active')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="card my-3">
                    <div class="card-header">
                        <h1 class="fs-5 text-center">Titik Jemput</h1>
                    </div>
                    <div class="card-body">
                        <div class="form-group mt-2">
                            <label for="jemput">Dari</label>
                            <select class="form-control mt-1" name="jemput" id="jemput" disabled>
                                <option value="">{{ $orders->jemput }}</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="nama_pengirim">Nama Pengirim</label>
                            <input class="form-control mt-1" type="text" name="nama_pengirim" id="nama_pengirim"
                                value="{{ $orders->nama_pengirim }}" disabled>
                        </div>
                        <div class="row">
                            <div class="form-group mt-2 col-lg-6">
                                <label for="jadwal">Tanggal Muat</label>
                                <input type="date" name="jadwal" id="jadwal" value="{{ $orders->jadwal }}"
                                    class="form-control mt-1" disabled>
                            </div>
                            <div class="form-group mt-2 col-lg-3">
                                <label for="start_time">Start time</label>
                                <input class="form-control mt-1" type="time" value="{{ $orders->start_time }}"
                                    name="start_time" id="start_time" disabled>
                            </div>
                            <div class="form-group mt-2 col-lg-3">
                                <label for="arrival_time">Arrival time</label>
                                <input class="form-control mt-1" type="time" value="{{ $orders->arrival_time }}"
                                    name="arrival_time" id="arrival_time" disabled>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="telp_jemput">No. Telp</label>
                            <input type="num" name="telp_jemput" class="form-control mt-1" placeholder="628XXXXX"
                                value="{{ $orders->telp_jemput }}" disabled>
                        </div>
                        <div class="form-group mt-2">
                            <label for="alamat_jemput">Alamat Lengkap</label>
                            <textarea class="form-control mt-1" name="alamat_jemput" id="alamat_jemput" rows="5"
                                disabled>{{ $orders->alamat_jemput }}</textarea>
                        </div>
                        <div class="row">
                            <div class="form-group mt-2 col-lg-6">
                                <label for="armada">Jenis Armada</label>
                                <select class="form-control mt-1" name="armada" id="armada" disabled>
                                    <option value="CDD Box">{{ $orders->armada }}</option>
                                </select>
                            </div>
                            <div class="form-group mt-2 col-lg-6">
                                <label for="feed_m">Jumlah Truk</label>
                                <select class="form-control mt-1" name="feed_m" disabled>
                                    <option value="0">
                                        @if ($orders->feed_m == 1)
                                            {{ '1' }}
                                        @endif
                                        @if ($orders->feed_m == 2)
                                            {{ '2' }}
                                        @endif
                                        @if ($orders->feed_m == 3)
                                            {{ '3' }}
                                        @endif
                                        @if ($orders->feed_m == 4)
                                            {{ '4' }}
                                        @endif
                                        @if ($orders->feed_m == 0)
                                            {{ 'Need Checker' }}
                                        @endif
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                        {{-- Find checker --}}
                    @if ($orders->status == null && Auth::user()->hasRole('shipper'))
                        @if ($orders->feed_m == 0 )
                            <form action="{{ route('feed_manager.find', ['id' => $orders->id]) }}" method="POST">
                                @csrf
                                @foreach ($feed_manager as $fm)

                                    <label for="">Feed Manager id</label> : {{ $fm->user->name }} <br>
                                    <input type="text" name="feed_id" class="form-control" value="{{ $fm->user_id }}">

                                @endforeach
                                <br>
                                <input type="hidden" name="orders_id" value="{{ $orders->id }}">
                                <input type="hidden" name="message" value="checker found">
                                {{-- <input type="hidden" name="status" value="Accupied"> --}}
                                <input type="submit" class="btn btn-success" value="Find Checker"> <br> <small
                                    class="text-danger"><em>*You haven't found the driver yet</em></small>
                            </form>
                            @else
                            {{-- Find driver --}}
                            <div class="card-body">
                                <form action="{{ route('driver.find', ['id' => $orders->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="message" value="Finded" >
                                    @foreach ($driver->slice(0, $orders->feed_m) as $drv)
                                        @if ($drv->hasRole('driver'))
                                        <label for="">Driver id</label> <br>
                                        <input type="text" name="driver_id[]" value="{{ $drv->id }}">
                                        @endif

                                    @endforeach
                                    <br>
                                    <input type="hidden" name="orders_id" value="{{ $orders->id }}">
                                    <input type="submit" class="btn btn-success" value="Find Driver"> <br> <small
                                        class="text-danger"><em>*You haven't found the driver yet</em></small>
                                </form>
                            </div>
                        @endif
                        
                            
                    @endif
                    @if ($orders->status == 1)
                        ingin ganti driver ?
                    @endif
                </div>
            </div>
            {{-- ------------------------------------------------------------------------------------------- --}}
            <div class="col-lg-7">
                <div class="card my-3">
                    <div class="card-header">
                        <h1 class="fs-5 text-center">Titik Tujuan</h1>
                    </div>
                    <div class="card-body">
                        <div class="form-group mt-2">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control mt-1" id="nama_barang" name="nama_barang"
                                value="{{ $orders->nama_barang }}" disabled>
                        </div>
                        <div class="form-group mt2">
                            <label for="jenis_barang">Jenis Barang</label>
                            <input type="text" class="form-control mt-1" value="{{ $orders->jenis_barang }}" disabled>
                        </div>
                        <div class="form-group mt-2">
                            <label for="jemput">Ke</label>
                            @foreach ($tujuan as $item)
                                <select class="form-control mt-1" name="jemput" id="jemput" disabled>
                                    <option value="">{{ $loop->iteration }}. {{ $item }}</option>
                                </select>
                            @endforeach

                        </div>
                        <div class="form-group mt-2">
                            <label for="nama_pengirim">Nama Penerima</label>
                            @foreach ($nama_penerima as $item)

                                <input class="form-control mt-1" type="text"
                                    value="{{ $loop->iteration }}. {{ $item }}" disabled>
                            @endforeach
                        </div>
                        <div class="form-group mt-2">
                            <label for="nama_pengirim">No. Telp</label>
                            @foreach ($telp_tujuan as $item)

                                <input class="form-control mt-1" type="text"
                                    value="{{ $loop->iteration }}. {{ $item }}" disabled>
                            @endforeach
                        </div>
                        <div class="form-group mt-2">
                            <label for="alamat_jemput">Alamat Lengkap</label>
                            @foreach ($telp_tujuan as $item)
                                <textarea class="form-control mt-1" name="alamat_jemput" id="alamat_jemput" rows="5"
                                    disabled>{{ $loop->iteration }}. {{ $item }}</textarea>
                            @endforeach
                        </div>
                    </div>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
