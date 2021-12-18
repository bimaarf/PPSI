@extends('layouts.backend.main_login')
@section('daftar-berita', 'active')
@section('content')
<div class="card rounded">
    <div class="card-body">
        <div class="fs-5">
            <i class="fas fa-home text-primary"></i>&emsp;<b>Beranda&emsp;/&emsp;Tambah Berita</b>
        </div>
    </div>
</div>

<div class="mt-2 card">
    <div class="card-header"><h4 class="text-dark"><strong>Tambah Berita</strong></h4></div>
    <div class="card-body">
        <form method="POST" action="/admin/berita/post">
            @csrf
            <div class="form-outline">
                <input value="{{ old('title') }}" type="text" class="form-control form-control-lg  @error('title') is-invalid @enderror" name="title" id="title">
                
                <label class="form-label" for="title">Judul</label>
            </div>
            <div class="form-group mt-4">
                <select class="form-select form-select-lg" name="kategori_id" id="kategori_id" required>
                    {{-- <option value="">-- Kategori --</option> --}}
                    @foreach ($kategori as $item)
                    @if (old('kategori_id') == $item->id)
                    <option value="{{ $item->id }}" selected>{{ $item->nama_kategori }}</option>
                    @else
                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-4">
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
            </div>
            <input class="btn btn-lg btn-primary mt-4" type="submit" value="Submit">
        </form>
    </div>
</div>

@endsection