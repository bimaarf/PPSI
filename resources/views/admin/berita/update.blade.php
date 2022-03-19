@extends('admin.main')
@section('daftar-berita', 'active')
@section('content')
    <div class="card shadow-none rounded">
        <div class="card-body">
            <div class="fs-5">
                <i class="fas fa-home text-primary"></i>&emsp;<b>Beranda&emsp;/&emsp;Edit Berita</b>
            </div>
        </div>
    </div>

    <div class="mt-2 card shadow-none">
        <div class="card-header">
            <h4 class="text-dark"><strong>Edit Berita</strong></h4>
        </div>
        <div class="card-body">
            <form method="get" action="{{ route('admin.berita.edit', ['slug' => $berita->slug]) }}">
                @csrf
                <div class="form-outline">
                    <input value="{{ $berita->title }}" type="text"
                        class="form-control form-control-lg  @error('title') is-invalid @enderror" name="title" id="title">

                    <label class="form-label" for="title">Judul</label>
                </div>
                <div class="form-group mt-4">
                    <select class="form-select form-select-lg" name="kategori_id" id="kategori_id" required>
                        {{-- <option value="">-- Kategori --</option> --}}
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $berita->kategori_id ? 'selected' : '' }}>
                                {{ $item->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-4">
                    <input id="body" type="hidden" name="body" value="{{ old('body', $berita->body) }}">
                    <trix-editor input="body"></trix-editor>
                </div>
                <button type="submit" class="btn btn-danger shadow-none float-right btn-lg">Simpan</button>
            </form>
        </div>
    </div>

@endsection
