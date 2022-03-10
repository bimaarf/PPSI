@extends('orders.main')
@section('pesan-armada', 'active')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="bg-white">
                <div class="card-body">
                    <h5 class="text-bold">Form Pesanan</h5>
                    <p>Mohon di isi dengan benar dan sesuai dengan data asli nya.</p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="bg-white">
                <div class="card-body">
                    <form action="#" method="post" id="first-page" name="first">
                        <div class="form-group">
                            <label class="fw-bold" for="nama1">Nama Pengirim</label>
                            <input class="form-control form-control-lg" type="text" name="nama_pengirim" id="nama1">
                        </div>
                        <div class="form-group mt-4">
                            <label for="name" class="fw-bold">Titik Jemput</label>
                            <select class="form-select form-select-lg" name="jemput" id="jemput">
                                @foreach ($zone as $item)
                                    <option value="{{ $item->zone }}">{{ $item->zone }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row m-0 mt-4" style="border: 1px solid #f0f0f0; padding:10px">
                            <label for="" class="text-center fw-bold">Rentang Waktu</label>
                            <div class="col-lg-4">
                                <div class="form-group mt-4" data-mdb-inline="true">
                                    <input type="date" name="jadwal" id="jadwal" class="form-control form-control-lg">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mt-4">
                                    <input class="form-control form-control-lg mt-1" type="time" name="start_time"
                                        id="start_time">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mt-4">
                                    <input class="form-control form-control-lg mt-1" type="time" name="arrival_time"
                                        id="arrival_time">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-4">
                                    <label class="fw-bold" for="telp_jemput">No. Telp</label>
                                    <div class="input-group input-group-lg mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-lg">+62</span>
                                        <input type="tel" name="telp_jemput" id="telp_jemput"
                                            class="form-control form-control-lg" pattern="\d{1,15}" maxlength="15">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-4">
                                    <label for="armada" class="fw-bold">Jenis Armada</label>
                                    <select class="form-select form-select-lg" name="armada" id="armada">
                                        <option value="CDD Box">CDD Box</option>
                                        <option value="CDD Reefer">CDD Reefer</option>
                                        <option value="Pickup">Pickup</option>
                                        <option value="Blindvan">Blindvan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 form-group mt-4">
                                <label for="feed_m" class="fw-bold">Jumlah Truk</label>
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
                            <div class="form-group mt-4">
                                <label class="fw-bold" for="alamat_jemput">Alamat Lengkap</label>
                                <textarea class="form-control form-control-lg" name="alamat_jemput" id="alamat_jemput"
                                    rows="5"></textarea>
                            </div>
                            <div class="mt-4">
                                <a href="#" onclick="next()" class="btn btn-info btn-lg fa-pull-right">Lanjut</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="demo"></div>
            <div class="bg-warning d-none" id="last-page">
       
                page 2
                <button type="submit" onclick="back()" class="btn btn-warning btn-lg fa-pull-right">Kembali</button>
            </div>
        </div>
    </div>
    <script>
        function next() {
            let a = document.getElementById('nama1').value;
            let b = document.getElementById('jadwal').value;
            let c = document.getElementById('start_time').value;
            let d = document.getElementById('arrival_time').value;
            let e = document.getElementById('telp_jemput').value;
            let f = document.getElementById('alamat_jemput').value;

            if (a == '' || b == '' || c == '' || d == '' || e == '' || f == '') {
                swal({
                    title: "Kosong!",
                    text: "Pastikan semua sudah terisi dengan benar",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                }).then((result) => {
                    if (result.dismiss !== 'cancel') {
                        $("#logoutTrue").click();
                    }
                })
            } else {
                const url = '/store-pesanan-1'
                const form1 = "#first-page"
                $('.btn').attr('disabled', true);
                $.ajax({
                    url: url,
                    type: "get",
                    data: $(form1).serialize(),
                    success: function(response) {
                        window.location.assign("/form-tujuan")
                    }
                });
            }
            // else {


            // }
        }
    </script>
@endsection
