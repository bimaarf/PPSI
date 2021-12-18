<!-- Contacts are loaded here -->
<div class="direct-chat-contacts">
  <ul class="contacts-list">
    @foreach ($chats as $chat)

      <li>
        <a href="#" onclick="bukaChat({{ json_encode($chat) }})" data-mdb-toggle="modal" data-mdb-target="#isi-pesan">
          <img class="contacts-list-img" src="{{ $chat['avatar_driver'] }}" alt="User Avatar">

          <div class="contacts-list-info">
              <div class="contacts-list-user" style="gap: .4rem">
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
     <!-- End Contact Item -->
    
    <!-- End Contact Item -->
  </ul>
  <!-- /.contacts-list -->
</div>
<!-- /.direct-chat-pane -->