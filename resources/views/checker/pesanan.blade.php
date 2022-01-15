@extends('layouts.backend.main_login')
@section('pesanan', 'active')
@section('content')
    <div class="card rounded d-xs-none d-lg-block d-md-none collapse">
        <div class="card-body">
            <div class="fs-5 ">
                <i class="fas fa-home text-primary"></i>&emsp;<strong>Beranda&emsp;/&emsp;Pesanan</strong>
            </div>
        </div>
    </div>
    <div id="alert-js" class="alert alert-success text-center mt-3" style="display: none;">
        <p id="status"></p>
    </div>
 
    <div class="mt-4">
        <div class="card">
            <div class="card-body">
                <!-- Pills content -->
                <div class="tab-content" id="ex2-content">
                    <div class="tab-pane fade show active" id="ex2-pills-1" role="tabpanel" aria-labelledby="ex2-tab-1">
                        <div class="table-responsive-sm" id="table-masuk">

                            <table class="table table-striped" style="width:100%">
                                <!-- Search form -->
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Pengirim</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Tujuan</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_pengirim }}</td>
                                            <td>{{ $item->jadwal }}</td>
                                            <td>
                                                @foreach (json_decode($item->tujuan) as $tujuan)
                                                    {{ $tujuan }},
                                                @endforeach
                                            </td>
                                            <td class="mb-0 fw-normal">
                                                @if ($item->status == 'Find Checker')
                                                    <span
                                                        class="btn btn-info rounded-9 btn-sm text-capitalize py-1 px-1">Butuh
                                                        bantuan</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" data-mdb-toggle="modal"
                                                    data-mdb-target="#checker{{ $item->id }}">
                                                    Lihat
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- Pills content -->
                @include('checker.modal.modal_pesanan')

            </div>
        </div>
    </div>
@endsection
