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
            <div class="card-header">
                <!-- Pills navs -->
                <ul class="nav nav-pills nav-fill mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="ex2-tab-1" data-mdb-toggle="pill" href="#ex2-pills-1" role="tab"
                            aria-controls="ex2-pills-1" onclick="tableMasuk()" aria-selected="true">Semua</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex2-tab-2" data-mdb-toggle="pill" href="#ex2-pills-2" role="tab"
                            aria-controls="ex2-pills-2" onclick="tableProses()" aria-selected="false">Diproses</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex2-tab-3" data-mdb-toggle="pill" href="#ex2-pills-3" role="tab"
                            aria-controls="ex2-pills-3" onclick="tableSelesai()" aria-selected="false">Selesai</a>
                    </li>
                </ul>
                <!-- Pills navs -->

            </div>
            <div class="card-body">
                <!-- Pills content -->
                <div class="tab-content" id="ex2-content">
                    <div class="tab-pane fade show active" id="ex2-pills-1" role="tabpanel" aria-labelledby="ex2-tab-1">
                        <div class="table-responsive-sm" id="table-masuk">
                            @include('driver.partial.table_load')
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ex2-pills-2" role="tabpanel" aria-labelledby="ex2-tab-2">
                        <div class="table-responsive-sm" id="table-proses">
                            @include('driver.partial.table_load')
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ex2-pills-3" role="tabpanel" aria-labelledby="ex2-tab-3">
                        <div class="table-responsive-sm" id="table-selesai">
                            @include('driver.partial.table_load')
                        </div>
                    </div>
                </div>
                <!-- Pills content -->

            </div>
        </div>
    </div>
@endsection
<script>
    loadAsync();

    function tableMasuk() {
        const url = "/driver/table-masuk"

        $.get(url, {}, function(checkout, status) {
            const query = "#table-masuk"
            $(query).html(checkout);
        });

    }

    function tableProses() {
        const url = "/driver/table-proses"

        $.get(url, {}, function(checkout, status) {
            const query = "#table-proses"
            $(query).html(checkout);
        });

    }

    function tableSelesai() {
        const url = "/driver/table-selesai"

        $.get(url, {}, function(checkout, status) {
            const query = "#table-selesai"
            $(query).html(checkout);
        });
    }

    function promise() {
        return new Promise(resolve => {
            setTimeout(() => {
                tableMasuk();
                tableProses();
                tableSelesai();
            }, 2000);
        })
    }
    async function loadAsync() {
        promise();
        console.log('load');
    }

    function terima(id) {
        const url = "/driver/v/terima-orderan/" + id
        const formTerima = "#form-terima" + id
        $('.btn').attr('disabled', true);
        $.ajax({
            url: url,
            type: "GET",
            data: $(formTerima).serialize(),
            success: function(response) {
                $('.btn').attr('disabled', false);
                $(".btn-close").click();
                tableMasuk();
                document.getElementById('ex2-tab-2').click();
            }
        })
    }

    function tolak(id) {
        const url = "/driver/v/tolak-orderan/" + id;
        const formTolak = "#form-tolak" + id;
        const driver_id = $("#driver_id").val();
        const status = "Pesanan sudah ditolak!";
        $('.btn').attr('disabled', true);
        $.ajax({
            url: url,
            type: "get",
            data: {
                driver_id: driver_id
            },
            success: function(response) {
                $('.btn').attr('disabled', false);
                $(".btn-close").click();
                loadAsync();
                $('#status').html(status);
                document.getElementById('alert-js').style.display = 'block';
            }
        });
    }
    // akses proses
    function jemputPesanan(id) {
        const url = "/driver/v/jemput-barang/" + id
        const formJemput = "#jemput-pesanan" + id
        const checkout_id = $("#checkout_id").val()
        const status = "Anda menjemput pesanan!"
        $('.btn').attr('disabled', true);
        $.ajax({
            url: url,
            type: "get",
            data: {
                checkout_id: checkout_id
            },
            success: function(response) {
                $('.btn').attr('disabled', false);
                $(".btn-close").click();
                tableProses();
                console.log('pesanan akan dijemput');
                $('#status').html(status);
                document.getElementById('alert-js').style.display = 'block';
            }
        })
    }

    function antarkanPesanan(id) {
        const url = "/driver/v/antar-barang/" + id
        const formAntar = "#antar-pesanan" + id
        const checkout_id = $("#checkout_id").val()
        const status = "Anda mengantarkan pesanan!";
        $('#antar').attr('disabled', true);
        $.ajax({
            url: url,
            type: "get",
            data: {
                checkout_id: checkout_id
            },
            success: function(response) {
                $('#antar').attr('disabled', false);
                $(".btn-close").click();
                tableProses();
                console.log('pesanan akan diantarkan');
                $("#status").html(status);
                document.getElementById('alert-js').style.display = 'block';
            }
        })
    }

    function konfirmasiPesanan(id) {
        const url = "/driver/v/sampai-barang/" + id
        const formKonfirm = "#konfirmas-pesanan" + id
        const status = "Anda sudah mengantarkan pesanan!"
        $('.btn').attr('disabled', true);
        $.ajax({
            url: url,
            type: "get",
            data: $(formKonfirm).serialize(),
            success: function(response) {
                $('.btn').attr('disabled', false);
                $('.btn-close').click();
                tableProses();
                console.log('pesanan sudah sampai');
                $("#status").html(status);
                document.getElementById('alert-js').style.display = 'block';
            }
        })
    }
</script>
