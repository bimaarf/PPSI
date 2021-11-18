@extends('layouts.backend.main_login')
@section('content')
<div class="card rounded">
    <div class="card-body">
        <div class="fs-5">
            <i class="fas fa-home text-primary"></i>&emsp;<b>Beranda&emsp;/&emsp;Chatting</b>
        </div>
    </div>
</div>
<div class="card rounded mt-2" id="myForm">
    <div class="my-custom-scrollbar" id="message">
        <div class="card-body p-3">
            <div id="read" class="chat-message komen" id="chatbot" style="height:400px;overflow-y: scroll;">
               {{-- @include('orders.modal.elements.read') --}}

            </div>
        </div>
    </div>
    <div class="card-footer text-muted white pt-1 pb-2 px-3">
        <div class="input-group">
            <input type="text" id="chat" name="chat" id="exampleForm2" class="form-control" maxlength="100" placeholder="{{ Auth::user()->name }}&ensp;:">
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-primary text-capitalize" style="width: 100%" onclick="store()"><i class="fa fa-paper-plane"></i></button>
            </div>
        </div>
    </div>
</div>
<script>
    // proses create data
    function store(){
        var name  = $("#chat").val();
        var track = "{{ $tracking->id }}" ;
        $.ajax({
            type : "get",
            url  : "{{ url('chatting/store/')}}/{{ $tracking->id }}",
            data : "chat="+name,
            success:function(data){
                $("#chat").val('');
                chatByShipper();
                // scroll down   
                $('#read').stop().animate({
                scrollTop: $("#read")[0].scrollHeight
                }, 1000);
                $("#read").attr({ scrollTop: $("#read").attr("scrollHeight") });
                // end scroll
            }
        });
    }
    // 
    function chatByShipper(){
        $.get("{{ url('chatting/read/')}}/{{ $tracking->id }}", {}, function(chatting, status){
            $("#read").html(chatting);
           
        });
    }
    setInterval(function() {
            chatByShipper();
        }, 1000);
</script>




@endsection
