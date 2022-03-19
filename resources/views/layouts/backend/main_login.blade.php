<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>
        @auth

            @if (Auth::user()->hasRole('shipper'))
                Shipper
            @endif
            @if (Auth::user()->hasRole('driver'))
                Driver
            @endif
            @if (Auth::user()->hasRole('admin|super-admin'))
                Admin
                @else
                Field Manager
            @endif
            | Dashboard
        @endauth

    </title>

    {{-- dinamik input add jalur driver --}}
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{-- break --}}
    <link rel="icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    {{-- <link rel="stylesheet" href="https://fontawesome.com/v5.15/icons/circle?style=solid">  berat --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/css/mdb.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">

    <script type="text/javascript" src="{{ asset('css/trix.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/custome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}" />

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

    </style>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>


</head>

<body class="mdb-skin-custom " data-mdb-spy="scroll" data-mdb-target="#scrollspy" data-mdb-offset="250"
    style="background-color: #f3f2ef;">
    @if (Session::has('sweet_alert.alert'))
        <script>
            swal({!! Session::get('sweet_alert.alert') !!});
        </script>
    @endif
    @include('layouts.backend.partial.navigation')

    <main class="mt-4 d-lg-block container">
        <div class="row">
            <div class="col-lg-4">
                @auth
                    @include('layouts.backend.partial.sidebar')
                @endauth
            </div>
            <div class="col-lg-8 badan">
                    @auth
                    <div class="card rounded d-lg-none d-xm-block">
                        <div class="p-3">
                            <div class="d-flex justify-content-between">
                                @role('driver')
                                    <img src="{{ asset('assets/icon/Driver.svg') }}"
                                        class="img-fluid img-thumbnail rounded-circle" width="40vh" alt="">
                                    <a href="{{ route('driver.akun_saya') }}"
                                        class="btn btn-outline-danger @yield('akun-saya')">
                                        <span class="fas fa-user fs-4 align-middle"></span></a>

                                    <a href="{{ route('driver.pesanan') }}" class="btn btn-outline-danger @yield('pesanan')">
                                        <span class="fas fa-envelope fs-4 align-middle"></span></a>
                                @endrole
                                @role('shipper')
                                    <img src="{{ asset('assets/icon/Shipper.svg') }}"
                                        class="img-fluid img-thumbnail rounded-circle" width="40vh" alt="">
                                    <a href="{{ route('user.akun_saya') }}"
                                        class="btn btn-outline-danger @yield('akun-saya')">
                                        <span class="fas fa-user fs-4 align-middle"></span></a>

                                    <a href="{{ route('user.pesanan') }}" class="btn btn-outline-danger @yield('pesanan')">
                                        <span class="fas fa-envelope fs-4 align-middle"></span></a>
                                @endrole
                                <a href="#" class="btn btn-outline-danger">
                                    <span class="fas fa-shipping-fast fs-4 align-middle"></span></a>

                                <a href="#" class="btn btn-primary">
                                    <span class="fas fa-sign-out-alt fs-4 align-middle"></span></a>
                            </div>
                        </div>
                    </div>
                @endauth

                @include('layouts.backend.partial.alert')
                @yield('content')
            </div>
        </div>
    </main>
    @include('layouts.backend.partial.footer')
    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/mdb.min.js') }}"></script>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append(
                '<tr><td><select class="form-select form-select-lg" name="tujuan[]" id="tujuan"><option value="">-- Tujuan --</option><option value="ketapang">Ketapang</option><option value="pontianak">Pontianak</option><option value="rasau">Rasau Jaya</option></select></td><td><input type="text" name="nama_penerima[]" class="form-control mt-1" placeholder="Nama Penerima" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Del</button></td></tr><tr><td><input type="text" name="alamat_tujuan[]" placeholder="Alamat Lengkap" class="form-control mt-1" /></td><td><input type="num" name="telp_tujuan[]" class="form-control mt-1" placeholder="628XXXXX"></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Del</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });
    </script>

    {{-- jquery ajax --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
   
    <script>
        function scrollBot(id) {
            setInterval(function() {
                readChat(id);
            }, 1000);
        }
    </script>

</body>

</html>
