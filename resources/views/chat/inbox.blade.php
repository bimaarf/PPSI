<!-- Contacts are loaded here -->
<div class="direct-chat-contacts" wire:poll="inbox({{Auth::id()}})">
    <ul class="contacts-list">
    @if (is_countable($chats) && count($chats) > 0)
    @foreach ($chats as $chat)
        <li>
        <a href="#" wire:click="bukaChat({{ json_encode($chat) }})" id="buka-chat">
            <img class="contacts-list-img" src="{{ $chat['avatar_driver'] }}" alt="User Avatar">

            <div class="contacts-list-info">
                <div class="contacts-list-user">
                    <span class="contacts-list-name nama">
                    {{ $chat['nama_driver'] }}
                    </span>
                    <span class="contacts-list-msg">
                        {{ $chat['chat'] }}
                    </span>
                </div>

                <small class="contacts-list-detail">
                <span class="contacts-list-date">
                    @php
                        $tanggal_chat = date_create($chat['waktu']);
                        $sekarang = date_create();
                        $selisih = date_diff($tanggal_chat, $sekarang);


                        if ($selisih->d == 0) {
                            echo date('H:i', strtotime($chat['waktu']));
                        }
                        else {
                            echo date('d/m/Y', strtotime($chat['waktu']));
                        }
                    @endphp
                </span>

                </small>
            </div>
            <!-- /.contacts-list-info -->
        </a>
        </li>
    @endforeach
    @else
        Tidak ada pesan
    @endif
    <!-- End Contact Item -->

    <!-- End Contact Item -->
    </ul>
    <!-- /.contacts-list -->
</div>
<!-- /.direct-chat-pane -->
