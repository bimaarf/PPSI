<!-- DIRECT CHAT -->
<div class="direct-chat direct-chat-primary" id="isi-pesan{{ $id }}">
    <div class="direct-chat-target">
        @if (Auth::user()->hasRole('shipper'))
            <button type="button" class="btn-back" title="back" data-widget="chat-pane-toggle" onclick="backToContact({{ $id }})"><i class="fas fa-arrow-left"></i>
            </button>
        @endif
        <h3 class="nama">{{ $nama }}</h3>
    </div>
    <!-- /.direct-chat-target -->
    
    <!-- Conversations are loaded here -->
    <div class="direct-chat-messages" id="read{{ $id }}">

    </div>
    <!--/.direct-chat-messages-->
    
    <div class="card-footer">
        <form action="#" method="post" id="chatForm{{ $id }}">
            <div class="input-group">
                <input type="text" name="chat" placeholder="Tulis Pesan Anda ..." class="form-control">
                <button type="button" class="btn-send" id="submit{{ $id }}" onclick="store({{ $id }})">
                    Kirim
                </button>
            </div>
        </form>
    </div>
    <!-- /.card-footer-->
</div>
<script>
        @if (Auth::user()->hasRole('driver'))
            panggil({{ $id }})
        @endif

        scrollDown({{ $id }})
    </script>

    {{-- <!-- Message. Default to the left -->
    <div class="direct-chat-msg">
    <div class="direct-chat-infos">
        <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
    </div>
    <!-- /.direct-chat-infos -->
    <img class="direct-chat-img" src="{{ asset('assets/img/landing/driver.png') }}" alt="message user image">
    <!-- /.direct-chat-img -->
    <div class="direct-chat-text">
        Working with AdminLTE on a great new app! Wanna join?
    </div>
    <!-- /.direct-chat-text -->
    </div>
    <!-- /.direct-chat-msg -->

    <!-- Message to the right -->
    <div class="direct-chat-msg right">
    <div class="direct-chat-infos">
        <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
    </div>
    <!-- /.direct-chat-infos -->
    <img class="direct-chat-img" src="{{ asset('assets/img/landing/shipper.png') }}" alt="message user image">
    <!-- /.direct-chat-img -->
    <div class="direct-chat-text">
        I would love to.
    </div>
    <!-- /.direct-chat-text -->
    </div>
    <!-- /.direct-chat-msg -->
</div>



</div>
<!--/.direct-chat -->  --}}