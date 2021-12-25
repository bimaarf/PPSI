@extends('layouts.backend.main_login')
@section('pesanan-dibatalkan', 'active')
@section('content')
<div class="card rounded d-xs-none d-lg-block d-md-none collapse">
    <div class="card-body">
        <div class="fs-5">
            <i class="fas fa-home text-primary"></i>&emsp;<b>Beranda&emsp;/&emsp;Pesanan Dibatalkan</b>
        </div>
    </div>
</div>    
    <div class="mt-2">
        @include('driver.partial.table_tolak')
    </div>
    
@endsection
