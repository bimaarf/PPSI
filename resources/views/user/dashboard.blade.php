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
        @include('user.partial.dashboard_shipper')
    @endif
    @if (
        Auth::user()->hasRole('driver')
    )
        @include('user.partial.dashboard_driver')
    @endif
    @if (
        Auth::user()->hasRole('feed-manager')
    )
        @include('user.partial.dashboard_feed')
    @endif
@endsection
