@extends('test.main')
@section('title')
    Kotak Masuk
@endsection

@section('style')
  <link rel="stylesheet" href="{{ asset('assets/css/chat.css') }}">
@endsection

@section('main-content')

  <section>
    <div class="judul">
      <h3 class="text-judul">Kotak Masuk</h3>
      <div class="perbarui-judul">Hubungi Admin</div>
    </div>

    <div class="isi" id="isi">
      @if (Auth::user()->hasRole("shipper"))
        <div id="inbox" class=""></div>
      
        <div id="pesan" class="d-none">
      @else
        <div id="pesan"></div>
      @endif
      
      
    </div>
  </section>
@endsection

        
@section('script')
    <script>
      let scrollDown = (id)=> {
        // console.log("lagi di scroll")
        // scroll down   
        $("#read" + id).stop().animate({
            scrollTop: 10000
        }, 1000);
        $("#read" + id).attr({ scrollTop: 10000 });
        // end scroll
      }
      
      let bukaChat = (chat)=> {
        $('#pesan').removeClass('d-none')
        $('#inbox').addClass('d-none')
        const url = "/buka/pesan/" + chat['track_id'] + "/" + chat['nama_driver']
        $.get(url, {}, function (id, nama, status) {
          $("#pesan").html(id, nama);
        });

        panggil(chat['track_id'])
        setTimeout(() => {
          scrollDown(chat['track_id'])
        }, 1000);
      }

      let bukaChatDriver = (id)=> {
        const url = "/buka/driver/pesan/" + id

        $.get(url, {}, function (id, nama, status) {
          $("#pesan").html(id, nama);
        });
        setTimeout(() => {
          scrollDown(id)
        }, 4000);
      }

      let panggil = (id) => {
        
        const read = setInterval(() => { readChat(id) }, 5000);

        setInterval(() => {
          if (document.getElementById("pesan").classList.contains("d-none")) {
            clearInterval(read)
          } else {
            read;
          }
        }, 1000);
      }

      let readChat = (id)=> {
        var url = "/pesan/" + id
        let read = "#read" + id
        
        $.get(url, {}, function (chattings, target_avatar, status) {
          $(read).html(chattings, target_avatar);
        });
        getInbox()
      }

      let store = (id)=> {
        const url = "/dashboard/driver/pesanan-diproses/store/" + id
        const contactUsForm = "#chatForm" + id
        const submit = "#submit" + id
        const read = "#read" + id


        $.ajax({
          url: url,
          type: "GET",
          data: $(contactUsForm).serialize(),
          success: function(response) {
            readChat(id);
            setTimeout(() => {
              scrollDown(id)
            }, 1000);
            document.querySelector(contactUsForm).reset()
          }
        });
      }

      let getInbox = ()=> {
        $.get("{{ route('inbox.kontak') }}", {}, function (chats, status) {
                $("#inbox").html(chats);
          });
      }

      let backToContact = (id)=> {
        $('#isi-pesan' + id).addClass('d-none')
        $('#pesan').addClass('d-none')
        $('#inbox').removeClass('d-none')
      }

      @if (Auth::user()->hasRole("shipper"))
        window.addEventListener("load", getInbox)
      @else 
        // console.log({{ Auth::id() }});
        window.addEventListener("load", bukaChatDriver({{ Auth::id() }}))
      @endif
      // const inputText = document.querySelector(".form-control")
      // inputText.addEventListener("click", ()=>{
      //   document.querySelector(".input-group").focus()
      // })

    </script>
@endsection

{{-- <!-- Contacts are loaded here -->
            <div class="direct-chat-contacts">
              <ul class="contacts-list">
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="{{ asset('assets/img/landing/driver.png') }}" alt="User Avatar">

                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Count Dracula
                        <small class="contacts-list-date float-right">2/28/2015</small>
                      </span>
                      <span class="contacts-list-msg">How have you been? I was...</span>
                    </div>
                    <!-- /.contacts-list-info -->
                  </a>
                </li>
                <!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="{{ asset('assets/img/landing/shipper.png') }}" alt="User Avatar">

                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Sarah Doe
                        <small class="contacts-list-date float-right">2/23/2015</small>
                      </span>
                      <span class="contacts-list-msg">I will be waiting for...</span>
                    </div>
                    <!-- /.contacts-list-info -->
                  </a>
                </li>
                <!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="{{ asset('assets/img/landing/shipper.png') }}" alt="User Avatar">

                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Nadia Jolie
                        <small class="contacts-list-date float-right">2/20/2015</small>
                      </span>
                      <span class="contacts-list-msg">I'll call you back at...</span>
                    </div>
                    <!-- /.contacts-list-info -->
                  </a>
                </li>
                <!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="{{ asset('assets/img/landing/shipper.png') }}" alt="User Avatar">

                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Nora S. Vans
                        <small class="contacts-list-date float-right">2/10/2015</small>
                      </span>
                      <span class="contacts-list-msg">Where is your new...</span>
                    </div>
                    <!-- /.contacts-list-info -->
                  </a>
                </li>
                <!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="{{ asset('assets/img/landing/shipper.png') }}" alt="User Avatar">

                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        John K.
                        <small class="contacts-list-date float-right">1/27/2015</small>
                      </span>
                      <span class="contacts-list-msg">Can I take a look at...</span>
                    </div>
                    <!-- /.contacts-list-info -->
                  </a>
                </li>
                <!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="{{ asset('assets/img/landing/shipper.png') }}" alt="User Avatar">

                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Kenneth M.
                        <small class="contacts-list-date float-right">1/4/2015</small>
                      </span>
                      <span class="contacts-list-msg">Never mind I found...</span>
                    </div>
                    <!-- /.contacts-list-info -->
                  </a>
                </li>
                <!-- End Contact Item -->
              </ul>
              <!-- /.contacts-list -->
            </div>
            <!-- /.direct-chat-pane --> --}}