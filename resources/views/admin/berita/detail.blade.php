@extends('admin.main')
@section('daftar-berita', 'active')
@section('content')
        <div class="card">
            <div class="card-header">
                <h4 class="text-dark">{{ $berita->title }}</h4>
            </div>
            <div class="card-body">
                <img src="{{ asset('storage/berita/'. $berita->image) }}" class="img-fluid" alt="image" style="height: 400px; object-position:  15% 20%; overflow: hidden;object-fit: cover;">
                <p>{!! $berita->body !!}</p>
            </div>
        </div>
@endsection