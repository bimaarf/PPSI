@extends('layouts.backend.main_login')
@section('content')
<div class="row">
            @foreach ($tracking as $track)
            <div class="col-lg-6 mt-2">
                <div class="card">
                    @foreach ($users->where('id', $track->driver_id) as $user)
                        
                    <div class="card-header  text-center">{{ $track->checkout->orders->jemput}}
                            @foreach (explode(",", str_replace(array('[', '"', ']'), ' ',
                            $track->checkout->orders->tujuan)) as $info)
                            -{{ $info }}
                            @endforeach
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"></h5>
                       <ul>
                           <li><b class="text-capitalize">{{ $user->name }}</b> menerima orderan</li>
                           <li>Barang dijemput dari <b>{{ $track->checkout->orders->alamat_jemput }}</b></li>
                           <li>Barang sedang dalam proses antar</li>
                           <li>Barang sampai di tempat tujuan</li>
                           <li class="text-danger">Tekan konfirmasi jika paket sudah anda terima</li>
                        </ul>
                    </div>
                    <div class="text-center mb-4">
                        <button class="btn btn-primary ">Konfirmasi Paket</button>
                        <a href="{{ route('chat.index', ['id' => $track->id]) }}" class="btn btn-success">Hubungi Driver</a>
                    </div>
                    <div class="card-footer text-muted">{{ $track->created_at }}</div>
                    @endforeach

                </div>
            </div>
            @endforeach
        </div>
@endsection