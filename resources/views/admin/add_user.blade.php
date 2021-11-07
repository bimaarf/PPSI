@extends('layouts.backend.main_login')
@section('add', 'active')
@section('content')
<div class="container pt-4">
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
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pink lighten-4">
          <li class="breadcrumb-item"><a class="black-text" href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Registrasi Admin</li>
        </ol>
    </nav>
    <form action="{{ route('admin.register') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header"><h4 class="text-dark"><strong>Registrasi Admin  | Driver</strong></h4></div>
                    <div class="card-body">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <div class="row">
                                <div class="col-md-5 text-center">
                                    <img src="{{ asset('assets/icon/Driver.svg') }}" class="img-fluid rounded mt-4" width="200vh" alt="">
                                    <div class="form-group mt-2">
                                        <label for="role"></label>
                                        <select id="role" name="role" class="form-control">
                                            @foreach ($roles as $rol)
                                                    @if ($rol->id == 2)
                                                    
                                                    <option value="{{ $rol->name }}"> {{ $rol->display_name }}</option>
                                                    @endif
                                                    @if ($rol->id == 5)
                                                    
                                                    <option value="{{ $rol->name }}"> {{ $rol->display_name }}</option>
                                                    @endif
                                            @endforeach
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <label for="name" :value="__('Name')">Username</label>
                                        <input class="form-control" type="text" name="name" id="name" :value="old('name')"
                                            placeholder="Username" required autofocus>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="email" :value="__('Email')">Email</label>
                                        <input class="form-control" type="email" name="email" id="email" :value="old('email')"
                                            placeholder="example@gmail.com" required>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="password" :value="__('Password')">Password</label>
                                        <input class="form-control" type="password" name="password" id="password" required
                                            autocomplete="new-password" placeholder="Password">
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="password_confirmation" :value="__('Confirm Password')">Konfirmasi
                                            Password</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation" required placeholder="Konfirmasi Password">
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="telp" :value="__('Telp')"><i class="fab fa-whatsapp text-success"></i>&nbsp;Whatsapp</label>
                                        <input class="form-control" type="num" name="telp" id="telp" :value="old('telp')"
                                            placeholder="628XXXX" required autofocus>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="alamat" :value="__('Alamat')">Alamat lengkap</label>
                                        <textarea class="form-control" :value="old('alamat')" name="alamat" id="alamat" cols="30" rows="5" placeholder="Masukkan alamat lengkap."></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark"><strong>Hak Akses</strong></h4>
                    </div>
                    <div class="card-body">
                        @foreach ($permission as $permis)
                            
                        <div class="form-check form-switch mt-4">
                            <input class="form-check-input" type="checkbox" id="{{ $permis->name }}" name="permission[]" value="{{ $permis->name }}">
                            <label class="form-check-label" for="{{ $permis->name }}"> {{ $permis->display_name }}</label>
                        </div>
                       
                        @endforeach
    
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-4 fa-pull-right">Register</button>

    </form>
</div>
@endsection
