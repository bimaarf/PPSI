div<div class="card chat-room small-chat wide" id="myForm">
    <div class="my-custom-scrollbar" id="message">
        <div class="card-body p-3">
            <div id="read" class="chat-message komen" style="height:300px;
            overflow-y: scroll;">

            </div>
        </div>
    </div>
    <div class="card-footer text-muted white pt-1 pb-2 px-3">
        <form name="contactUsForm" id="contactUsForm" method="GET" action="javascript:void(0)">
            <div class="row">
                <div class="col-9">
                    <input type="text" id="track_id" name="track_id" class="form-control" maxlength="100"
                        placeholder="{{ Auth::user()->name }}&ensp;: track -> {{ $track->id }}"
                        value="{{ $track->id }}"> <br>
                    <input type="text" id="chat" name="chat" class="form-control" maxlength="100"
                        placeholder="{{ Auth::user()->name }}&ensp;: track -> {{ $track->id }}">
                </div>
                <div class="col-3">
                    <button type="submit" id="submit" class="btn btn-outline-primary text-capitalize"
                        style="width: 100%" onclick="store{{ $track->id }}()"><i class="fa fa-paper-plane"></i>&nbsp;Kirim</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
                                // proses create data
                                // function store(){
                                //     var chatting  = $("#chat").val();
                                //     var track_id  = $("#track_id").val();
                                //     $.ajax({
                                //         type : "get",
                                //         url  : "{{ route('chat.store', ['id' => $track->id]) }}",
                                //         data : "chat="+ chatting,
                                //         success:function(data){
                                //             $("#chat").val('');
                                //             readChat();
                                //             // scroll down   
                                //             $('#read').stop().animate({
                                //             scrollTop: $("#read")[0].scrollHeight
                                //             }, 1000);
                                //             $("#read").attr({ scrollTop: $("#read").attr("scrollHeight") });
                                //             // end scroll
                                //         }
                                //     });
                                // }
                                // //
                                function readChat() {
                                    $.get("{{ route('orders.modal.elements.read', ['id' => $track->id-1]) }}", {}, function(chatting, status) {
                                        $("#read").html(chatting);
                            
                                    });
                            
                                }
                            
                                // ajax form
                                function store{{ $track->id }}() {
                            
                                    // $.ajaxSetup({
                                    //     headers: {
                                    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    //     }
                                    // });
                                    // $('#submit').html('Please Wait...');
                                    // $("#submit").attr("disabled", true);
                                    $.ajax({
                                        url: "{{ route('chat.store') }}",
                                        type: "GET",
                                        data: $('#contactUsForm').serialize(),
                                        success: function(response) {
                                            $('#submit').html('Submit');
                                            readChat();
                                            // scroll down   
                                            $('#read').stop().animate({
                                            scrollTop: $("#read")[0].scrollHeight
                                            }, 1000);
                                            $("#read").attr({ scrollTop: $("#read").attr("scrollHeight") });
                                            // end scroll
                                            document.getElementById("contactUsForm").reset();
                                        }
                                    });
                            
                                }
                            </script>
