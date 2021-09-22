@extends('layouts.backend.main')
<div class="container">
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
        <div class="col-lg-5">
            <div class="card my-3">
                <div class="card-header">
                    <h1 class="fs-5 text-center">Titik Jemput</h1>
                </div>
                <div class="card-body">
                    <div class="form-group mt-2">
                        <label for="jemput">Dari</label>
                        <select class="form-control mt-1" name="jemput" id="jemput">
                            <option value="">-- Pilih --</option>
                            <option value="ketapang">Ketapang</option>
                            <option value="pontianak">Pontianak</option>
                            <option value="rasau">Rasau Jaya</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="nama_pengirim">Nama Pengirim</label>
                        <input class="form-control mt-1" type="text" name="nama_pengirim" id="nama_pengirim">
                    </div>
                    <div class="row">
                        <div class="form-group mt-2 col-6">
                            <label for="start_time">Start time</label>
                            <input class="form-control mt-1" type="time" name="start_time" id="start_time"> 
                        </div>
                        <div class="form-group mt-2 col-6">
                            <label for="arrival_time">Arrival time</label>
                            <input class="form-control mt-1" type="time" name="arrival_time" id="arrival_time">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="telp_jemput">No. Telp</label>
                        <input type="num" name="telp_jemput" class="form-control mt-1" placeholder="628XXXXX">
                    </div>
                    <div class="form-group mt-2">
                        <label for="alamat_jemput">Alamat Lengkap</label>
                        <textarea class="form-control mt-1" name="alamat_jemput" id="alamat_jemput" rows="5"></textarea>
                    </div>
                    <div class="row">
                        <div class="form-group mt-2 col-lg-6">
                            <label for="armada">Jenis Armada</label>
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
                            <label for="feed_m">Feed Manager</label>
                            <select class="form-control mt-1" name="feed_m">
                                <option value="0">-- Pilih --</option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ------------------------------------------------------------------------------------------- --}}
        <div class="col-lg-7">
            <div class="card my-3">
                <div class="card-header">
                    <h1 class="fs-5 text-center">Titik Tujuan </h1>
                </div>

                    
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mt-4" id="dynamicAddRemove">
                            <thead>
                                <tr>
                                    <th>Alamat</th>
                                    <th>Tujuan</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td>
                                        <select class="form-control mt-1" name="tujuan[]">
                                            <option value="">-- Tujuan --</option>
        
                                            <option value="ketapang">Ketapang</option>
                                            <option value="pontianak">Pontianak</option>
                                            <option value="rasau">Rasau Jaya</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="nama_penerima[]" class="form-control mt-1"
                                            placeholder="Nama Penerima" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="alamat_tujuan[]" placeholder="Alamat Lengkap"
                                            class="form-control mt-1" />
                                    </td>
        
                                    <td>
                                        <input type="num" name="telp_tujuan[]" class="form-control mt-1" placeholder="628XXXXX">
                                    </td>
                                    <td>
                                        <button type="button" name="add" id="dynamic-ar"
                                            class="btn btn-outline-primary">Add</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
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
</div>
