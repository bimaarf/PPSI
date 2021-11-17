<div class="card-header text-center">{{ $orders->jemput }}
    @foreach (json_decode($item->orders->tujuan) as $info)
        -{{ $info }}
    @endforeach
</div>
<div class="card-body">
    <h5 class="card-title"></h5>
    <div class="bs-vertical-wizard">

        @include('orders.proses.timeline')
        
        {{-- @foreach ($tracking->where('checkout_id', $item->id) as $track)
            
        <div class="text-center mt-4 konfirmasi">
            <button type="button" id="hulk" class="btn btn-success text-capitalize" data-mdb-toggle="modal" data-mdb-target="#exampleModal{{ $track->id }}"><i class="fa fa-comment text-white"></i> Hubungi Driver</button>
        </div>
        @include('orders.modal.chattings')
        @endforeach --}}
    </div>
</div>
