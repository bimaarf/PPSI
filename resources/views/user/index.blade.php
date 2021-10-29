@extends('layouts.backend.main_login')
@section('dashboard', 'active')
@section('content')
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
    @if(Auth::user()->hasRole('shipper|admin'))
        @include('user.partial.table')
    @endif
@endsection
