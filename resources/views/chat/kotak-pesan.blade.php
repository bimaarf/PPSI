<!-- DIRECT CHAT -->
<div class="direct-chat direct-chat-primary" id="isi-pesan">
    <div class="direct-chat-target">
        @if (Auth::user()->hasRole('shipper'))
            <button type="button" class="btn-back" title="back" wire:click="tutupChat()">
                <i class="fas fa-arrow-left"></i>
            </button>
        @endif
        <h3 class="nama">{{ $sender }}</h3>
    </div>
    <!-- /.direct-chat-target -->

    <!-- Conversations are loaded here -->
    <div class="direct-chat-messages" id="read" wire:poll="bacaChat()">
        @include('chat.isi-pesan')
    </div>
    <!--/.direct-chat-messages-->

    <div class="card-footer">
        <form wire:submit.prevent="kirimPesan">
            <div wire:loading wire:target='kirimPesan'>
                Mengirim pesan . . .
            </div>
            <div class="input-group">
                <input type="text" placeholder="Tulis Pesan Anda ..." class="form-control" wire:model="pesan">
                <button class="btn-send" id="submit">
                    Kirim
                </button>
            </div>
        </form>
    </div>
    <!-- /.card-footer-->
</div>
<!--/.direct-chat -->

