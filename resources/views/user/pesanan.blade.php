@extends('layouts.backend.main_login')
@section('pesanan', 'active')
@section('content')

<div id="alert-js" class="alert alert-success text-center mt-3" style="display: none;">
    <p id="status"></p>
</div>
    <div class="card shadow-none">
        <div class="card-header">
            <!-- Pills navs -->
            <ul class="nav nav-pills nav-fill mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active shadow-none" id="ex2-tab-1" data-mdb-toggle="pill" href="#ex2-pills-1" role="tab"
                        aria-controls="ex2-pills-1" onclick="tableMasuk()" aria-selected="true">Semua</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link shadow-none" id="ex2-tab-2" data-mdb-toggle="pill" href="#ex2-pills-2" role="tab"
                        aria-controls="ex2-pills-2" onclick="tableProses()" aria-selected="false">Diproses</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link shadow-none" id="ex2-tab-3" data-mdb-toggle="pill" href="#ex2-pills-3" role="tab"
                        aria-controls="ex2-pills-3" onclick="tableSelesai()" aria-selected="false">Selesai</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link shadow-none" id="ex2-tab-4" data-mdb-toggle="pill" href="#ex2-pills-4" role="tab"
                        aria-controls="ex2-pills-4" onclick="tableBatal()" aria-selected="false">Batal</a>
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
                <div class="tab-pane fade" id="ex2-pills-4" role="tabpanel" aria-labelledby="ex2-tab-4">
                    <div class="table-responsive-sm" id="table-batal">
                        @include('driver.partial.table_load')
                    </div>
                </div>
            </div>
            <!-- Pills content -->

        </div>
    </div>
@endsection
<script>
     function tableMasuk()
     {
        $.get("{{ route('user.partial.table_masuk') }}", {}, function(orders, status) {
            $("#table-masuk").html(orders);
        });
     }
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

    //  shipper access
    function finDriver(id) {
        const url       = "/cari-driver/" + id

        var driver_id = $('#driver_id').map(function(){ 
            return this.value; 
        }).get();
        $('#find').attr('disabled', true);
        $.ajax({
            type: 'GET',
            url: url,
            data: {
                'driver_id[]': driver_id,
            },
            success: function(response) {
                $('#find').attr('disabled', false);
                $(".btn-close").click();
                document.getElementById('ex2-tab-2').click();
            }
        });
    }

    function hapusPesanan(id) {
        const url       = "/hapus-pesanan/" + id
        const formHapus = "#form-hapus" + id
        $.ajax({
            url: url,
            type: "GET",
            data: $(formHapus).serialize(),
            success: function(response) {
                $(".btn-close").click();
                tableMasuk();
                document.getElementById('ex2-tab-4').click();
            }
        })
    }
     setTimeout(() => {
         tableMasuk();
         tableProses();
         tableSelesai();
         tableBatal();
     }, 2000);
     function konfirmasi(){
        $('.btn').attr('disabled', false);
     }
</script>