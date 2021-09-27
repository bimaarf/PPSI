@extends('layouts.backend.main_login')
@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card mt-2">
            <div class="card-body komen" data-spy="scroll" data-offset="0"
                style="width:50vh; height: 60vh;overflow-y: scroll; ">
                <h5 class="text-primary text-center ">To : Driver</h5>
                {{-- him --}}
                <hr class="mt-4 mb-4">
                <div class="row">
                    <div class="col-2">
                        <img class="rounded-circle " width="40" src="{{ asset('assets/avatar/default.jpg') }}" alt="">
                    </div>
                    <div class="col-9">
                        <span class=" text-dark"><b>asdaaaa</b>

                            <img src="{{ asset('assets/verified/verified.svg') }}" width="12" alt="">
                        </span>
                        <span class="float-left">Lorem ipsum, dolor sit amet consectetur adipisicing elit.asd</span>
                        <br>
                        <small>12-jui</small>
                    </div>

                </div>
                <hr class="mt-4 mb-4">
                {{-- end him --}}
                {{-- youu --}}
                <div class="row">

                    <div class="col-9">
                        <span class="text-dark"><b class=" float-end">asdaaaa</b></span>
                        <img src="{{ asset('assets/verified/verified.svg') }}" class="float-end mt-2" width="12"
                            alt="">
                        <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit.asdasdas</span>
                        <br>
                        <small>12-jui</small>
                    </div>
                    <div class="col-2">
                        <img class="rounded-circle " width="40" src="{{ asset('assets/avatar/default.jpg') }}" alt="">
                    </div>
                </div>
                {{-- end you --}}
            </div>
            <form action="" method="post">
                @csrf
                <div class="card-body row">
                    <div class=" rounded col-8">
                        <input class="form-control bg-white text-dark " onkeyup="textKomen()" name="comment"
                            style="border: none;" placeholder="Add a comment..." required>

                    </div>
                    <div class="rounded col-2">
                        <button type="submit" class="btn btn-outline-primary " maxlength="100">Send</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    </div>
@endsection
