@extends('layouts.backend.main_login')
@section('pesan-armada', 'active')
@section('content')

    <div class="py-lg-5" >
        <form class="justify-content-center" method="POST" action="{{ route('user.order') }}">
            @csrf
            <div class="card my-3">
                <div class="card-header">
                    <h1 class="fs-5 text-center">Form Lokasi Tujuan Pengiriman</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mt-4">
                            <select class="form-select form-select-lg" name="jemput" id="jemput">
                                {{-- <option value="">Titik Jemput</option> --}}
                                @foreach ($zone as $item)

                                    <option value="{{ $item->zone }}">{{ $item->zone }}</option>
                                @endforeach
                            </select>
                            <div class="row m-0 mt-4" style="border: 1px solid #f0f0f0; padding:10px">
                                <label for="" class="text-center form-label">Rentang Jemput</label>
                                <div class="col-lg-4">
                                    <div class="form-group mt-4" data-mdb-inline="true">
                                        <input type="date" name="jadwal" id="jadwal" class="form-control form-control-lg"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mt-4">
                                        <input class="form-control form-control-lg mt-1" type="time" name="start_time"
                                            id="start_time" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mt-4">
                                        <input class="form-control form-control-lg mt-1" type="time" name="arrival_time"
                                            id="arrival_time" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-outline mt-4">
                                <textarea class="form-control form-control-lg" name="alamat_jemput" id="alamat_jemput"
                                    rows="5" required></textarea>
                                <label class="form-label" for="alamat_jemput">Alamat Lengkap</label>
                            </div>
                        </div>

                        <div class="col-lg-6 ">
                            <div class="form-outline mt-4">
                                <input class="form-control form-control-lg" type="text" name="nama_pengirim" id="nama1"
                                    required>
                                <label class="form-label" for="nama1">Nama Pengirim</label>
                            </div>
                            <div class="form-outline mt-4">
                                <input type="tel" name="telp_jemput" id="telp_jemput" class="form-control form-control-lg"
                                pattern="\d{1,15}" maxlength="15" required>
                                <label class="form-label" for="telp_jemput">No. Telp</label>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-6">
                                    <label for="armada">Jenis Armada</label>
                                    <select class="form-select form-select-lg" name="armada" id="armada" required>
                                        <option value="CDD Box">CDD Box</option>
                                        <option value="CDD Reefer">CDD Reefer</option>
                                        <option value="Pickup">Pickup</option>
                                        <option value="Blindvan">Blindvan</option>
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <label for="feed_m">Jumlah Truk</label>
                                    <div class="form-control form-control-lg">
                                        <input type="radio" name="feed_m" class="m-2" value="1" id="feed_m1">
                                        <label for="feed_m1">1</label>
                                        <input type="radio" name="feed_m" class="m-2" value="2" id="feed_m2">
                                        <label for="feed_m2">2</label>
                                        <input type="radio" name="feed_m" class="m-2" value="3" id="feed_m3">
                                        <label for="feed_m3">3</label>
                                        <input type="radio" name="feed_m" class="m-2" value="4" id="feed_m4">
                                        <label for="feed_m4">4</label> <br>
                                            <input type="radio" name="feed_m" class="m-2" value="0" id="feed_m0">
                                            <label for="feed_m">Feed Manager</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 fa-pull-right">
                        <button type="submit" class="btn btn-primary btn-lg">Lanjut</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
