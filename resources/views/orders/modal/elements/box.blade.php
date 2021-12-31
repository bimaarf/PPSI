<div class="card chat-room small-chat wide" id="myForm">
    <div class="my-custom-scrollbar" id="message">
        <div class="card-body p-3">
            <div id="read{{ $track->id }}" class="chat-message komen read" style="height:300px;
            overflow-y: scroll;">

            </div>
        </div>
    </div>
    <div class="card-footer text-muted white pt-1 pb-2 px-3">
        <form name="contactUsForm" id="contactUsForm{{ $track->id }}" method="GET" action="javascript:void(1)">
            <div class="row">
                <div class="col-9">
                    {{-- <input type="text" id="track_id" name="track_id" class="form-control" maxlength="100"
                        placeholder="{{ Auth::user()->name }}&ensp;: track -> {{ $track->id }}"
                        value="{{ $track->id }}"> <br> --}}
                    <input type="text" id="chat{{ $track->id }}" name="chat" class="form-control" maxlength="100"
                        placeholder="Tuliskan sesuatu..">
                </div>
                <div class="col-3">
                    <button type="submit" id="submit{{ $track->id }}" class="btn btn-outline-primary text-capitalize kirim-pesan"
                        style="width: 100%" onclick="store({{ $track->id }})"><i class="fa fa-paper-plane"></i>&nbsp;Kirim</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function readChat(id) {

        const url = "/chatting/read/" + id


        $.get(url, {}, function(chatting, status) {
            const query= "#read" + id
            // console.log(query);
            $(query).html(chatting);
        });

    }

    function store(id) {
        const url = "/dashboard/driver/pesanan-diproses/store/" + id;
        const contactUsForm = "#contactUsForm" + id;
        const submit = "#submit" + id;
        const read = "#read" + id;
        const chat  = $("#chat"+ id).val();

        // console.log($(contactUsForm).serialize());
        $('.btn').attr('disabled', true);
        $.ajax({
            url: url,
            type: "GET",
            data: {chat:chat},
            success: function(response) {
                $('.btn').attr('disabled', false);
                $(submit).html('Submit');
                readChat(id);
                // scroll down   
                $(read).stop().animate({
                scrollTop: $(read)[0].scrollHeight
                }, 1000);
                $(read).attr({ scrollTop: $(read).attr("scrollHeight") });
                // end scroll
                document.querySelector(contactUsForm).reset();
                $("#chat"+ id).val('');
            },error: () => {
                $('.btn').attr('disabled', false);
            }
        });
    }
</script>
