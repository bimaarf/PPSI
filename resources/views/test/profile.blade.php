@extends('test.main')
@section('title')
    Profil
@endsection
@section('main-content')
    <section>
        <div class="judul">
            <h3 class="text-judul">Profil</h3>
            <div class="perbarui-judul">Perbarui Profil</div>
        </div>
        <div class="isi">
            <div>
                <h4>Status</h4>
                <p>Shipper</p>
            </div>
            <div>
                <h4>Nama Lengkap</h4>
                <p class="nama">{{ Auth::user()->name }}</p>
            </div>
            <div>
                <h4>Alamat</h4>
                <p>{{ Auth::user()->alamat }}</p>
            </div>
            <div>
                <h4>No. HP</h4>
                <p>+{{ Auth::user()->telp }}</p>
            </div>
            <div>
                <h4>Email</h4>
                <p>{{ Auth::user()->email }}</p>
            </div>
        </div>
    </section>
@endsection