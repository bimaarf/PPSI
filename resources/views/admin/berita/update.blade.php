@extends('layouts.backend.main_login')
@section('daftar-berita', 'active')
@section('content')
<div class="card rounded">
    <div class="card-body">
        <div class="fs-5">
            <i class="fas fa-home text-primary"></i>&emsp;<b>Beranda&emsp;/&emsp;Edit Berita</b>
        </div>
    </div>
</div>

<div class="mt-2 card">
    <div class="card-header"><h4 class="text-dark"><strong>Edit Berita</strong></h4></div>
    <div class="card-body">
        <form method="post" action="/admin/berita/post/{{ $berita->slug }}">
            @method('put')
            @csrf
            <div class="form-outline">
                <input value="{{ $berita->title }}" type="text" class="form-control form-control-lg  @error('title') is-invalid @enderror" name="title" id="title">
                
                <label class="form-label" for="title">Judul</label>
            </div>
            <div class="form-group mt-4">
                <select class="form-select form-select-lg" name="kategori_id" id="kategori_id" required>
                    {{-- <option value="">-- Kategori --</option> --}}
                    @foreach ($kategori as $item)
                    <option value="{{ $item->id }}"{{($item->id==$berita->kategori_id) ? 'selected' : ''}}>{{ $item->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-4">
                <input id="body" type="hidden" name="body" value="{{ $berita->body }}">
                <trix-editor input="body"></trix-editor>
            </div>
            <input class="btn btn-lg btn-primary mt-4" type="submit" value="Submit">
        </form>
    </div>
</div>

@endsection