@extends('layouts.backend.main_login')
@section('daftar-berita', 'active')
@section('content')
<div class="card">
    <div class="card-header text-center py-3">
        <h5 class="mb-0 text-center">
            <strong>Pesanan Anda</strong>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover text-nowrap">
                <!-- Search form -->
                <thead>

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Author</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($berita as $item)
                            <tr>
                                <td class="mb-0 fw-normal">{{ $loop->iteration }}</td>
                                <td class="mb-0 fw-normal">{{ $item->title }}</td>
                                @foreach ($users->where('id', $item->author) as $user)
                                    
                                <td class="mb-0 fw-normal">{{ $user->name}}</td>
                                @endforeach
                                <td class="mb-0 fw-normal">{{ $item->kategori->nama_kategori }}</td>

                                <td class="mb-0 fw-normal">
                                    <div class="btn-group" role="group">
                                    <a href="{{ route('admin.berita.detail', ['slug'=>$item->slug]) }}" class="btn btn-danger text-capitalize">Lihat</a>
                                    <a href="{{ route('admin.berita.update', ['slug'=>$item->slug]) }}" class="btn btn-info text-capitalize">Edit</a>

                                    </div>
                                </td>
                               
                            </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        {{ $berita->links() }}
    </div>
</div>

@endsection