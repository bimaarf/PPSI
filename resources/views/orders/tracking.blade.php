@extends('layouts.backend.main_login')
@section('pesanan-diproses', 'active')
@section('content')
<div class="card rounded">
    <div class="card-body">
        <div class="fs-5">
            <i class="fas fa-home text-primary"></i>&emsp;<b>Beranda&emsp;/&emsp;Lacak</b>
        </div>
    </div>
</div>
    <div class="row"  id="timeline">
        @include('orders.proses.proses_track')
    </div>


    <script>
        function timeline() {
            $.get("{{ url('orders/proses-track') }}/{{ $orders->id }}", {}, function(checkout, status) {
                $("#timeline").html(checkout);
    
            });
        }
    </script>
@endsection
