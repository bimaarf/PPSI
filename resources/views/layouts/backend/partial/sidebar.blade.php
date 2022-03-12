<nav class="d-lg-block collapse" style="z-index: 9; height: 700px">
    <!-- Search form -->
    <div class="bg-white" style="border-top-left-radius: 50px; border-bottom-left-radius: 50px; height:100%;">
        <div class="position-sticky">
            <div class="list-group list-group-flush pt-4 mx-4">
                <div class="row">
                    <div class="col-3">
                        <img src="{{ asset('assets/icon/Shipper.svg') }}" class="img-thumbnail rounded-circle" alt="">
                    </div>
                    <div class="col-9 align-self-center">
                        <h4 class="text-capitalize text-black-100">{{ Auth::user()->name }}</h4>
                    </div>
                </div>
                <hr>

                @if (Auth::check())
                    @if (Auth::user()->hasRole('admin|super-admin'))
                        @include('layouts.backend.partial.elements.side_admin')
                    @endif
                    @if (Auth::user()->hasRole('driver'))
                        @include('layouts.backend.partial.elements.side_driver')
                    @endif
                    @if (Auth::user()->hasRole('shipper'))
                        @include('layouts.backend.partial.elements.side_shipper')
                    @endif
                    @if (Auth::user()->hasRole('feed-manager'))
                        @include('layouts.backend.partial.elements.side_checker')
                    @endif
                    <a href="#"
                        class="list-group-item list-group-item-action rounded-6 mt-3 btn btn-danger"
                        onclick="logout()">
                        <div class="row">
                            <div class="col-2 fas fa-circle fs-1"></div>
                            <div class="col-1"></div>
                            <div class="col-8 align-self-center">
                                <span class="fs-6 text-capitalize">Keluar</span>
                            </div>
                        </div>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="mb-4 d-none position-relative"
                        style="margin-top: 20px">
                        @csrf
                        <a id="logoutTrue" href="{{ route('logout') }}"
                            class="list-group-item list-group-item-action rounded-6 mt-3 btn btn-danger"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            <div class="row">
                                <div class="col-2 fas fa-circle fs-1"></div>
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
