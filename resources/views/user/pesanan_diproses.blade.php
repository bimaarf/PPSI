@extends('layouts.backend.main_login')
@section('pesanan-diproses', 'active')
@section('content')
<div class="card rounded">
    <div class="card-body">
        <div class="fs-5">
            <i class="fas fa-home text-primary"></i>&emsp;<b>Beranda&emsp;/&emsp;Pesanan Diproses</b>
        </div>
    </div>
</div>    
    <div class="mt-2">
        @include('user.partial.table_proses')
    </div>

@endsection
