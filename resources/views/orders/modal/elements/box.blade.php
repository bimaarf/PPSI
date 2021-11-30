<div class="card chat-room small-chat wide" id="myForm">
    <div class="my-custom-scrollbar" id="message">
        <div class="card-body p-3">
            <div id="read" class="chat-message komen" id="chatbot" style="height:300px;
            overflow-y: scroll;">
               {{-- @include('orders.modal.elements.read') --}}

            </div>
        </div>
    </div>
    <div class="card-footer text-muted white pt-1 pb-2 px-3">
        <div class="row">
            <div class="col-9">
                <input type="text" id="chat" name="chat" class="form-control" maxlength="100" placeholder="{{ Auth::user()->name }}&ensp;:">
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-outline-primary text-capitalize" style="width: 100%" onclick="store()"><i class="fa fa-paper-plane"></i>&nbsp;Kirim</button>
            </div>
        </div>
    </div>
</div>
<script>
    // proses create data
    function store(){
        var chatting  = $("#chat").val();
        $.ajax({
            type : "get",
            url  : "{{ route('chat.store', ['id'=>$track->id]) }}",
            data : "chat="+ chatting,
            success:function(data){
                $("#chat").val('');
                readChat();
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
    function readChat(){
        $.get("{{ route('orders.modal.elements.read', ['id'=>$track->id]) }}", {}, function(chatting, status){
                $("#read").html(chatting);
          
            });
        
    }

   
</script>

