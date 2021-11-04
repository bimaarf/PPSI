@extends('layouts.backend.main_login')
@section('add', 'active')
@section('content')
<div class="container pt-4">
    <form action="{{ route('admin.register') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header"><h4 class="text-dark"><strong>Form Admin</strong></h4></div>
                    <div class="card-body">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="name" :value="__('Name')">Username</label>
                                    <input class="form-control" type="text" name="name" id="name" :value="old('name')"
                                        placeholder="Username" required autofocus>
                                </div>
                                <div class="form-group col-md-7">
                                    <label for="email" :value="__('Email')">Email</label>
                                    <input class="form-control" type="email" name="email" id="email" :value="old('email')"
                                        placeholder="example@gmail.com" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mt-2 col-md-5">
                                    <label for="password" :value="__('Password')">Password</label>
                                    <input class="form-control" type="password" name="password" id="password" required
                                        autocomplete="new-password">
                                </div>
                                <div class="form-group mt-2 col-md-5">
                                    <label for="password_confirmation" :value="__('Confirm Password')">Konfirmasi
                                        Password</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="password_confirmation" required>
                                </div>
                                <div class="form-group mt-2 col-md-2">
                                    <label for="role"></label>
                                    <select id="role" name="role" class="form-control">
                                        <option value="">-- Role --</option>
                                        @foreach ($roles as $rol)
                                                @if ($rol->id == 1)
                                                
                                                <option value="{{ $rol->name }}"> {{ $rol->display_name }}</option>
                                                @endif
                                                @if ($rol->id == 2)
                                                
                                                <option value="{{ $rol->name }}"> {{ $rol->display_name }}</option>
                                                @endif
                                        @endforeach
                                       
                                    </select>
                                </div>
                            </div>
                            
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark"><strong>Hak Akses</strong></h4>
                    </div>
                    <div class="card-body">
                        @foreach ($permission as $permis)
                            
                        <div class="form-check form-switch mt-3">
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
