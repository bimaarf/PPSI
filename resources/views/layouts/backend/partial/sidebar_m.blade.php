@if (Auth::check())
<nav id="sidebarMenu"  class="d-xs-block collapse" style="z-index: 9">
    <!-- Search form -->
   <div class="card" style="border-top-left-radius: 50px; border-bottom-left-radius: 50px; height:100%;">
            <div class="position-sticky">
            <div class="list-group list-group-flush pt-4 mx-4">
                <div class="row">
                    <div class="col-3">
                        <img src="{{ asset('assets/icon/Shipper.svg') }}" class="img-thumbnail rounded-circle" alt="">
                    </div>
                    <div class="col-9 align-self-center">
                        @if (Auth::check())
                        <h4 class="text-capitalize text-black-100">{{ Auth::user()->name }}</h4>
                        @endif
                    </div>
                </div>
                <hr>
                 {{-- admin --}}
                 @include('layouts.backend.partial.elements.side_admin')

                 {{-- driver --}}
                 @include('layouts.backend.partial.elements.side_driver')
                 
                 {{-- shipper --}}
                 @include('layouts.backend.partial.elements.side_shipper')
            
                @if (Auth::check())
                <form method="POST" action="{{ route('logout') }}" class="mb-4 position-relative">
                    @csrf
                <a href="{{ route('logout') }}" class="list-group-item list-group-item-action rounded-6 mt-3 btn btn-danger" onclick="event.preventDefault(); this.closest('form').submit();">
                    <div class="row">
                        <div class="col-2">
                            <i class="fas fa-circle fs-1" ></i>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-8 align-self-center">
                            <span class="fs-6 text-capitalize">Keluar</span>
                        </div>
                    </div>
                </a>
            </form>
            @endif
            </div>
        </div>
   </div>
</nav>
@endif