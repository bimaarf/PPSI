@extends('layouts.backend.main')
@section('content')
    <form class="row g-3 justify-content-center" method="POST" action="{{ route('user.order') }}">
        @csrf
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
        <div class="col-lg-6">
            <div class="card my-3">
                <div class="card-header">
                    <h1 class="fs-5 text-center">Titik Jemput</h1>
                </div>
                <div class="card-body">
                    <div class="form-group mt-2">
                        <label for="provinsi_a">Provinsi</label>
                        <select class="form-control mt-1" name="provinsi_a" id="provinsi_a">
                            <option value="">-- Pilih Provinsi --</option>
                            @foreach ($provinsi->where('province_id', 12) as $prov)

                                <option value="{{ $prov->province_id }}">{{ $prov->province }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="kab_kota_a">Kabupaten / Kota</label>
                        <select class="form-control mt-1" name="kab_kota_a" id="kab_kota_a">
                            <option value="">-- Pilih Kabupaten / Kota --</option>
                            @foreach ($city->where('province_id', 12) as $ct)

                                <option value="{{ $ct->city_id }}">{{ $ct->city_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="telp_a">No. Telp</label>
                        <input type="num" name="telp_a" class="form-control mt-1" placeholder="628XXXXX">
                    </div>
                    <div class="form-group mt-2">
                        <label for="alamat_a">Alamat Lengkap</label>
                        <textarea class="form-control mt-1" name="alamat_a" id="alamat_a" rows="5"></textarea>
                    </div>
                    <div class="row">
                        <div class="form-group mt-2 col-lg-6">
                            <label for="armada">Jeni Armada</label>
                            <select class="form-control mt-1" name="armada" id="armada">
                                <option value="CDD Box">CDD Box</option>
                                <option value="CDD Reefer">CDD Reefer</option>
                                <option value="Pickup">Pickup</option>
                                <option value="Blindvan">Blindvan</option>
                            </select>
                        </div>
                        <div class="form-group mt-2 col-lg-3">
                            <label for="jadwal">Tanggal Muat</label>
                            <input type="date" name="jadwal" id="jadwal" class="form-control mt-1">
                        </div>
                        <div class="form-group mt-2 col-lg-3">
                            <label for="multi">Multi Stop</label>
                            <input type="number" name="multi" id="multi" class="form-control mt-1" min="1" max="8"
                                value="1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-8 mt-2">
                            <label for="jenis_barang">Jenis Barang</label>
                            <input type="text" class="form-control mt-1" name="jenis_barang" id="jenis_barang" />
                        </div>
                        <div class="form-group col-lg-4 mt-2">
                            <label for="jumlah_barang">Jumlah Barang</label>
                            <input type="num" class="form-control mt-1" name="jumlah_barang" id="jumlah_barang" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mt-2 col-4">
                            <label for="panjang">Panjang</label>
                            <input type="text" class="form-control mt-1" name="panjang">

                        </div>
                        <div class="form-group mt-2 col-4">
                            <label for="lebar">Lebar</label>
                            <input type="text" class="form-control mt-1" name="lebar">
                        </div>
                        <div class="form-group mt-2 col-4">
                            <label for="tinggi">Tinggi</label>
                            <input type="text" class="form-control mt-1" name="tinggi">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ------------------------------------------------------------------------------------------- --}}
        <div class="col-lg-6">
            <div class="card my-3">
                <div class="card-header">
                    <h1 class="fs-5 text-center">Titik Tujuan </h1>
                </div>
                <div class="card-body">
                    <div class="form-group mt-2">
                        <label for="provinsi_b">Provinsi</label>
                        <select class="form-control mt-1" name="provinsi_b" id="provinsi_b">
                            <option value="">-- Pilih Provinsi --</option>
                            @foreach ($provinsi->where('province_id', 12) as $prov)

                                <option value="{{ $prov->province_id }}">{{ $prov->province }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="kab_kota_b">Kabupaten / Kota</label>
                        <select class="form-control mt-1" name="kab_kota_b" id="kab_kota_b">
                            <option value="">-- Pilih Kabupaten / Kota --</option>
                            @foreach ($city->where('province_id', 12) as $ct)

                                <option value="{{ $ct->city_id }}">{{ $ct->city_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group mt-2 col-8">
                            <label for="telp_b">No. Telp</label>
                            <input type="num" name="telp_b" class="form-control mt-1" placeholder="628XXXXX">
                        </div>
                        <div class="form-group mt-2 col-4">
                            <label for="total">Total</label>
                            <input type="num" name="total" class="form-control mt-1" />
                        </div>
                    </div>
                    {{-- <div class="form-group mt-2">
                        <label for="alamat_b">Alamat Penerima</label>
                        <textarea class="form-control mt-1" name="alamat_b" id="alamat_b" rows="5"></textarea>
                    </div> --}}
                    <table class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="alamat_b[]" placeholder="Enter subject" class="form-control" />
                            </td>
                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add</button></td>
                        </tr>
                    </table>

                    {{-- dinamik --}}
                    {{-- <table class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="addMoreInputFields[0][subject]" placeholder="Enter subject" class="form-control" />
                            </td>
                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add</button></td>
                        </tr>
                    </table> --}}

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Save</button>

                    </div>
                </div>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </form>
@endsection
