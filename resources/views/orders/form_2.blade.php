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
                    <form class="justify-content-center" method="POST" action="{{ route('user.order2') }}">
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
                                <select class="form-select form-select-lg" name="tujuan[]" required>
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
                                <textarea class="form-control form-control-lg" name="alamat_tujuan[]" id="alamat_tujuan"
                                    rows="5"></textarea>
                            </div>
                        </div>
                        @if ($orders->feed_m == 1)
                        <div id="newRow"></div>
                        <button id="addRow" type="button" class="btn btn-info mt-4">Tambah Tujuan</button>
                        @endif
                        <button type="submit" class="btn btn-primary">Kirim</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // add row
        var i = 1;
        $("#addRow").click(function() {
            ++i;
            var html = '';
            html += '<div class="row mt-2" id="inputFormRow" style="border: 1px solid #f0f0f0; padding:10px">';
            html += '<p>Multi Stop : <span type="text" id="inc">' + (i+1) + ' </p>';
            html += '<div class="col-md-6">';
            html += '<label class="fw-bold" for="nama_penerima">Tujuan</label>';
            html += '<select class="form-select form-select-lg" name="tujuan[]" required>';
            html += '@foreach ($zone as $item)';
            html += '<option value="{{ $item->zone }}">{{ $item->zone }}</option>';
            html += '@endforeach';
            html += '</select>';
            html += '<div class="mt-4">';
            html += '<label class="fw-bold" for="telp_tujuan">No. Telp Penerima</label>';
            html += '<div class="input-group input-group-lg mb-3">';
            html += '<span class="input-group-text" id="inputGroup-sizing-lg">+62</span>';
            html += '<input type="number" name="telp_tujuan[]" id="telp_tujuan" class="form-control form-control-lg" pattern="\d{1,15}" maxlength="15">';
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
            html += '<textarea class="form-control form-control-lg" name="alamat_tujuan[]" id="alamat_tujuan" rows="5"></textarea>';
            html += '</div>';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function() {
            --i;

            $(this).closest('#inputFormRow').remove();
        });
    </script>

@endsection
