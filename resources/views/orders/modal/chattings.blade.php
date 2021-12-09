<!-- Modal -->
<div class="modal top fade" id="exampleModal{{ $track->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog   modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
            <div class="heading row justify-content-start">
                <div class="profile-photo col-2">
                  <img src="{{ asset('assets/icon/Driver.svg') }}" alt="avatar" class="img-thumbnail rounded-circle ml-0">
                  <span class="state"></span>
                </div>
                <div class="data col-10">
                    
                    @if (Auth::user()->hasRole('driver'))

                    <p class="name mb-0"><strong class="text-capitalize">{{ $track->checkout->orders->nama_pengirim }}</strong></p>
                        
                    @endif
                    @if (Auth::user()->hasRole('shipper|admin|super-admin'))
                        @foreach ($users->where('id', $track->driver_id) as $usr)
                        
                        <p class="name mb-0"><strong class="text-capitalize">{{ $usr->name }}</strong></p>
                        
                        @endforeach   
                    @endif                 
                    <p class="activity text-muted mb-0">Active now</p>
                </div>
              </div>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="page" class="p-2">
                @include('orders.modal.elements.box')
            </div>
        </div>
      </div>
    </div>
  </div>


  {{-- {{ route('chat.index', ['id' => $track->id]) }} --}}