@extends('layouts.backend.main_login')
@section('pesanan_anda', 'active')
@section('content')
    <div class="card rounded">
        <div class="card-body">
            <div class="fs-5">
                <i class="fas fa-home text-primary"></i>&emsp;<b>Beranda&emsp;/&emsp;Pesanan Anda</b>
            </div>
        </div>
    </div>
    <div class="card mt-2">
        <!-- Tabs navs -->
        <ul class="nav nav-tabs align-self-center" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link text-capitalize active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1" role="tab"
                    aria-controls="ex1-tabs-1" aria-selected="false">Pesanan Anda&emsp;
                @if ($pesananSaya > 0)
                    <div class="fa-pull-right">
                        <span class="badge rounded-pill badge-notification bg-danger">
                            {{ $pesananSaya }}
                        </span>
                    </div>
                @endif
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-capitalize" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2" role="tab"
                    aria-controls="ex1-tabs-2" aria-selected="false" onclick="tableProses()">Pesanan Diproses&emsp;
                @if ($pesananDiproses > 0)
                    <div class="fa-pull-right">
                        <span class="badge rounded-pill badge-notification bg-danger">
                            {{ $pesananDiproses }}
                        </span>
                    </div>
                @endif
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-capitalize" id="ex1-tab-3" data-mdb-toggle="tab" href="#ex1-tabs-3" role="tab"
                    aria-controls="ex1-tabs-3" aria-selected="false" onclick="tableSelesai()">Pesanan Selesai&emsp;
                @if ($pesananSelesai > 0)
                    <div class="fa-pull-right">
                        <span class="badge rounded-pill badge-notification bg-danger">
                            {{ $pesananSelesai }}
                        </span>
                    </div>
                @endif
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-capitalize" id="ex1-tab-4" data-mdb-toggle="tab" href="#ex1-tabs-4" role="tab"
                    aria-controls="ex1-tabs-4" aria-selected="false" onclick="tableBatal()">Pesanan Dibatalkan&emsp;
                @if ($pesananDibatalkan > 0)
                    <div class="fa-pull-right">
                        <span class="badge rounded-pill badge-notification bg-danger">
                            {{ $pesananDibatalkan }}
                        </span>
                    </div>
                @endif
            </a>
            </li>
        </ul>
        <!-- Tabs navs -->

        <!-- Tabs content -->
        <div class="tab-content" id="ex1-content">
            <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                @include('user.partial.table_masuk')
            </div>
            <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                <div id="table-proses"></div>
            </div>
            <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                <div id="table-selesai"></div>
            </div>
            <div class="tab-pane fade" id="ex1-tabs-4" role="tabpanel" aria-labelledby="ex1-tab-4">
                <div id="table-batal"></div>
            </div>
        </div>
        <!-- Tabs content -->
    </div>
@endsection
<script>
     function tableProses()
     {
        $.get("{{ route('user.partial.table_proses') }}", {}, function(orders, status) {
            $("#table-proses").html(orders);
        });
     }
     function tableSelesai()
     {
        $.get("{{ route('user.partial.table_selesai') }}", {}, function(orders, status) {
            $("#table-selesai").html(orders);
        });
     }
     function tableBatal()
     {
        $.get("{{ route('user.partial.table_batal') }}", {}, function(orders, status) {
            $("#table-batal").html(orders);
        });
     }
     
</script>

