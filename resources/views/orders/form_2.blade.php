@extends('orders.main')
@section('pesan-armada', 'active')
@section('style')
    <style>
        #id {
            color: red;
        }

    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="bg-white">
                <div class="card-body">
                    <h5 class="text-bold">Form Pesanan</h5>
                    <p>Mohon di isi dengan benar dan sesuai dengan data asli nya.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="bg-white">
                <div class="card-body">
                    <form class="justify-content-center" method="POST" action="{{ route('user.order2') }}" id="form2">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="fw-bold" for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control form-control-lg" id="nama_barang"
                                        name="nama_barang" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="fw-bold" for="nama_barang">Jenis Barang</label>
                                    <select class="form-select form-select-lg" name="jenis_barang" id="jenis_barang">
                                        <option value="Kotak">Kotak</option>
                                        <option value="Peti">Peti</option>
                                        <option value="Palet">Palet</option>
                                        <option value="Barel">Barel</option>
                                        <option value="Karung">Karung</option>
                                        <option value="Furniture">Furniture</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border: 1px solid #f0f0f0; padding:10px">
                            <p>Multi Stop : <span type="text">1</p>
                            <div class="col-md-6">
                                <label class="fw-bold" for="tujuan">Tujuan</label>
                                <select class="form-select form-select-lg tujuan" name="tujuan[]" id="tujuan" required>
                                    <option value="" selected>--Pilih Tujuan--</option>
                                    @foreach ($zone as $item)
                                        <option value="{{ $item->zone }}">{{ $item->zone }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-4">
                                    <label class="fw-bold" for="telp_tujuan">No. Telp Penerima</label>
                                    <div class="input-group input-group-lg mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-lg">+62</span>
                                        <input type="number" name="telp_tujuan[]" id="telp_tujuan"
                                            class="form-control form-control-lg" pattern="\d{1,15}" maxlength="15">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="fw-bold" for="nama_penerima">Nama Penerima</label>
                                    <input class="form-control form-control-lg" type="text" name="nama_penerima[]">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="fw-bold" for="alamat_tujuan">Alamat Lengkap</label>
                                <textarea class="form-control form-control-lg" name="alamat_tujuan[]" id="alamat_tujuan" rows="5"></textarea>
                            </div>
                        </div>
                        @if ($orders->feed_m == 1)
                            <div id="newRow"></div>
                            <button id="addRow" type="button" class="btn btn-info mt-4">Tambah Tujuan</button>
                        @endif
                        <br><small class="text-danger font-italic" id="harga"></small><br>
                        <button type="submit" class="btn btn-primary">Kirim</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#tujuan").change(function() {
            let d = document.getElementById("tujuan")
            let displayText = d.options[d.selectedIndex].text
            document.getElementById("harga").textContent = displayText
        })
        // add row
        let multi = 1;
        $("#addRow").click(function() {
            ++multi;
            let html = '';
            html += '<div class="row mt-2" id="inputFormRow" style="border: 1px solid #f0f0f0; padding:10px">';
            html += '<p>Multi Stop : <span type="text" id="inc">' + (multi + 1) + ' </p>';
            html += '<div class="col-md-6">';
            html += '<label class="fw-bold" for="nama_penerima">Tujuan</label>';
            html += '<select class="form-select form-select-lg tujuan" name="tujuan[]" required>';
            html += '@foreach ($zone as $item)';

                html += '<option value="{{ $item->zone }}">{{ $item->zone }}</option>';
                html += '@endforeach ';
            html += '</select>';
            html += '<div class="mt-4">';
            html += '<label class="fw-bold" for="telp_tujuan">No. Telp Penerima</label>';
            html += '<div class="input-group input-group-lg mb-3">';
            html += '<span class="input-group-text" id="inputGroup-sizing-lg">+62</span>';
            html +=
                '<input type="number" name="telp_tujuan[]" id="telp_tujuan" class="form-control form-control-lg" pattern="\d{1,15}" maxlength="15">';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-md-6">';
            html += '<div class="form-group">';
            html += '<label class="fw-bold" for="nama_penerima">Nama Penerima</label>';
            html += '<input class="form-control form-control-lg" type="text" name="nama_penerima[]">';
            html += '</div>';
            html += '</div>';
            html += '<div class="form-group">';
            html += '<label class="fw-bold" for="alamat_tujuan">Alamat Lengkap</label>';
            html +=
                '<textarea class="form-control form-control-lg" name="alamat_tujuan[]" id="alamat_tujuan" rows="5"></textarea>';
            html += '</div>';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function() {
            --multi;

            $(this).closest('#inputFormRow').remove();
        });
    </script>

@endsection
@section('script')
    <script>
        if ("{{ $field }}" != "0") {
            $("#tujuan").change(function() {
                let d = document.getElementById("tujuan")
                let bmArea = d.options[d.selectedIndex].text
                let bsArea = "{{ $address }}"
                const Area = {
                    "Pontianak": [350000, 500000, 0],
                    "Sungai Pinyuh": [500000, 550000, 57],
                    "Mempawah": [700000, 800000, 75],
                    "Singkawang": [1000000, 1200000, 151],
                    "Pemangkat": [1250000, 1300000, 181],
                    "Tebas": [1500000, 1550000, 203],
                    "Sambas": [1650000, 1750000, 226],
                    "Simpang Ampar": [700000, 800000, 104],
                    "Sosok": [1000000, 1150000, 154],
                    "Bodok": [1250000, 1300000, 171],
                    "Sanggau": [1500000, 1600000, 195],
                    "Sekadau": [1650000, 1850000, 240],
                    "Sintang": [2100000, 2200000, 321],
                    "Tayan": [700000, 800000, 106],
                    "Balai Bekuak": [1300000, 1400000, 195],
                    "Sandai": [1500000, 1650000, 304],
                    "Nanga Tayap": [1800000, 1900000, 346],
                    "Ketapang": [2400000, 3000000, 354],
                }

                if (bmArea in Area) {
                    const jarak = Math.abs(Area[bmArea][2] - Area[bsArea][2])
                const hargaBMArea = Area[bmArea]
                const hargaBsArea = Area[bsArea]
                let jarakBMArea
                if (hargaBMArea[2] == 0) {
                    jarakBMArea = 1
                } else {
                    jarakBMArea = hargaBMArea[2]
                }
                let harga1
                let harga2
                if (jarak == 0) {
                    harga2 = hargaBsArea[1]
                    harga1 = hargaBsArea[0]
                } else {
                    harga1 = (Math.abs(hargaBMArea[0] - hargaBsArea[0]) * jarak) / jarakBMArea + hargaBsArea[0]
                    harga2 = (Math.abs(hargaBMArea[1] - hargaBsArea[1]) * jarak) / jarakBMArea + hargaBsArea[1]
                }


                let displayText = document.getElementById("harga").textContent = "*Perkiraan Harga Rp " + harga1*{{ $field }} +
                    " - Rp " + harga2*{{ $field }}
                }
            })
        } else {
            $("#tujuan").change(function() {
                let displayText = document.getElementById("harga").textContent = "*Perkiraan harga tidak tersedia jika menggunakan field manager"
            })
        }
    </script>
@endsection
