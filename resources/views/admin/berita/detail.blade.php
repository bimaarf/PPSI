@extends('layouts.backend.main_login')
@section('daftar-berita', 'active')
@section('content')
        <div class="card">
            <div class="card-header">
                <h4 class="text-dark">{{ $berita->title }}</h4>
            </div>
            <div class="card-body">
                <p>{!! $berita->body !!}</p>
            </div>
        </div>
@endsection