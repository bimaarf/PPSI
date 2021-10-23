<div class="card mt-2">
    <div class="card-body komen" data-spy="scroll" data-offset="0"
        style="width:50vh; height: 60vh;overflow-y: scroll; ">
        
        @if (Auth::user()->hasRole('driver'))
        <h5 class="text-primary text-center ">To : Customer</h5>
            
        @endif
        @if (Auth::user()->hasRole('shipper|admin'))
        <h5 class="text-primary text-center ">To : Driver</h5>
            
        @endif
        @foreach ($chatting->where('track_id', $tracking->id) as $item)
        
        @if ($item->user_id != Auth::id())
            {{-- him --}}
            
            <div class="row">
                <div class="col-2">
                    <img class="rounded-circle " width="40" src="{{ asset('assets/avatar/default.jpg') }}" alt="">
                </div>
                <div class="col-9">
                    <span class="text-dark "><b class=" float-start">{{ $item->user->name }}</b></span>
                    @foreach ($role_driver as $driver)
                    @if ($item->user->id == $driver->user_id)
                        
                    <img src="{{ asset('assets/verified/verified.svg') }}" class="float-start mt-2 px-1" width="19" alt="">
                    @endif
                    @endforeach
                    <p class="float-start px-1">{{ $item->chat }}</p>
                    <br><br><br>
                    <small style="font-size: 10px">{{ $item->created_at }}</small>
                </div>

            </div>
            <hr class="mt-4 mb-4">
            {{-- end him --}}
               
           @endif
       @if ($item->user_id == Auth::id())
        {{-- youu --}}
        <div class="row">

            <div class="col-9">
                <span class="text-dark "><b class=" float-end">{{ $item->user->name }}</b></span>
                @foreach ($role_driver as $driver)
                    @if ($item->user->id == $driver->user_id)
                        
                    <img src="{{ asset('assets/verified/verified.svg') }}" class="float-end mt-2 px-1" width="19" alt="">
                    @endif
                @endforeach
                <p class="float-end px-1">{{ $item->chat }}</p>
                <br><br><br>
                <small style="font-size: 10px">{{ $item->created_at }}</small>
            </div>
            <div class="col-2">
                <img class="rounded-circle " width="40" src="{{ asset('assets/avatar/default.jpg') }}" alt="">
            </div>
        </div>
        {{-- end you --}}
        <hr class=" mb-1">
       @endif
        @endforeach

    </div>
    <form action="{{ route('chat.tambah', ['id' => $tracking->id]) }}" method="POST">
        @csrf
        <div class="card-body row">
            <div class=" rounded col-8">
                <input class="form-control bg-white text-dark " onkeyup="textKomen()" name="chat"
                    style="border: none;" placeholder="Ketikkan sesuatu..." required>

            </div>
            <div class="rounded col-2">
                <input type="button" value="Reload Page" onClick="updateChat()">
                <button type="submit" class="btn btn-outline-primary" onClick="window.location.reload();" maxlength="100">Send</button>
            </div>
        </div>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            // jQuery Document
            $(document).ready(function () {
                $("#submitmsg").click(function () {
                    var clientmsg = $("#usermsg").val();
                    $.post("post.php", { text: clientmsg });
                    $("#usermsg").val("");
                    return false;
                });

                function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request

                    $.ajax({
                        url: "log.html",
                        cache: false,
                        success: function (html) {
                            $("#chatbox").html(html); //Insert chat log into the #chatbox div

                            //Auto-scroll			
                            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request
                            if(newscrollHeight > oldscrollHeight){
                                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                            }	
                        }
                    });
                }

                setInterval (loadLog, 2500);

                $("#exit").click(function () {
                    var exit = confirm("Are you sure you want to end the session?");
                    if (exit == true) {
                    window.location = "index.php?logout=true";
                    }
                });
            });
        </script>
        
    </form>