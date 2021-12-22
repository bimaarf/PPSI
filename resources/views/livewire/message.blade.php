<section>
<div class="judul">
    <h3 class="text-judul">Kotak Masuk</h3>
    <div class="perbarui-judul">Hubungi Admin</div>
</div>

<div class="isi" id="isi">
    @if (Auth::user()->hasRole("shipper"))
    <div id="inbox" class="{{$inbox}}">
        @include('chat.inbox')
    </div>

    <div id="pesan" class="{{$baca}}">
        @include('chat.kotak-pesan')
    </div>
    @else
    <div id="pesan">
        @include('chat.kotak-pesan')
    </div>
    @endif
</div>
</section>

<script>
    document.addEventListener('livewire:load', ()=>{
        setTimeout(() => {

            $("#read").stop().animate({
                scrollTop: 10000
            }, 1000);
            $("#read").attr({ scrollTop: 10000 });


            let pesan = document.getElementById("buka-chat")
            let submit = document.getElementById("submit")
            pesan.addEventListener("click", ()=>{
                setTimeout(() => {

                    $("#read").stop().animate({
                        scrollTop: 10000
                    }, 1000);
                    $("#read").attr({ scrollTop: 10000 });
                }, 4000);
            })

            submit.addEventListener("click", ()=>{
                setTimeout(() => {

                    $("#read").stop().animate({
                        scrollTop: 10000
                    }, 1000);
                    $("#read").attr({ scrollTop: 10000 });
                }, 3000);
            })


        }, 5000);
    })
</script>
