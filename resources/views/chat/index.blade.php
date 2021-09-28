@extends('layouts.backend.main_login')
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
    <div class="container d-flex justify-content-center"  id="show" onload = "JavaScript:AutoRefresh(1000);">
        @include('chat.chat')
    </div>
    </div>
@endsection
