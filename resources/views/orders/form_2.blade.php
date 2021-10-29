@extends('layouts.backend.main')
<div class="container mt-4">
    <form class="row g-3 justify-content-center" method="POST" action="{{ route('user.order2') }}">
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
        
        {{-- ------------------------------------------------------------------------------------------- --}}
        <div class="col-lg-7">
            <div class="card my-3">
                <div class="card-header">
                    <h1 class="fs-5 text-center">Titik Tujuan </h1>
                </div>

                    
                <div class="card-body">
                    <div class="form-group mt-2">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control mt-1" id="nama_barang" name="nama_barang" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group mt2">
                        <label for="jenis_barang">Jenis Barang</label>
                        <select class="form-control mt-1" name="jenis_barang" id="jenis_barang" >
                            <option value="">-- Pilih --</option>
                            <option value="Plastik">Plastik</option>
                            <option value="Sampah">Sampah</option>
                            <option value="Apa aja">Apa aja</option>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered mt-4" id="dynamicAddRemove" required>
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
                                        <select class="form-control mt-1" name="tujuan[]" required>
                                            <option value="">-- Tujuan --</option>
        
                                            @foreach ($zone as $item)
                                
                                            <option value="{{ $item->zone }}">{{ $item->zone }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="nama_penerima[]" class="form-control mt-1"
                                            placeholder="Nama Penerima" required />
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="alamat_tujuan[]" placeholder="Alamat Lengkap"
                                            class="form-control mt-1" required />
                                    </td>
        
                                    <td>
                                        <input type="num" name="telp_tujuan[]" class="form-control mt-1" placeholder="628XXXXX">
                                    </td>
                                    <td>
                                        
                                        @if ($orders->feed_m == 1)
                                       <button type="button" name="add" id="dynamic-ar"
                                       class="btn btn-outline-primary">Add</button>
                                            
                                        @endif
                                           
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
