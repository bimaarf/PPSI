<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    {{-- <meta http-equiv="refresh" content="1"> --}}
    <title>
        @if (Auth::user()->hasRole('shipper'))
            Shipper
        @endif
        @if (Auth::user()->hasRole('driver'))
            Driver
        @endif
        @if (Auth::user()->hasRole('admin|super-admin'))
            Admin
        @endif
        | Dashboard
    </title>
    <link rel="icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fontawesome.com/v5.15/icons/circle?style=solid">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- stepper --}}
    
    <style>
        html,
        body {
            padding: 25px 0 0;
            margin: 0;
            font-family: 'Open Sans', 'Verdana', Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 14px;
            background-color: #f9f9fb;
            height: 100%;
        }

        .bs-vertical-wizard {
            border-right: 1px solid #eaecf1;
            padding-bottom: 50px;
        }

        .bs-vertical-wizard ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .bs-vertical-wizard ul>li {
            display: block;
            position: relative;
        }

        .bs-vertical-wizard ul>li>a {
            display: block;
            padding: 10px 10px 10px 40px;
            color: #333c4e;
            font-size: 17px;
            font-weight: 400;
            letter-spacing: .8px;
        }

        .bs-vertical-wizard ul>li>a:before {
            content: '';
            position: absolute;
            width: 1px;
            height: calc(100% - 25px);
            background-color: #bdc2ce;
            left: 13px;
            bottom: -9px;
            z-index: 3;
        }

        .bs-vertical-wizard ul>li>a .ico {
            pointer-events: none;
            font-size: 14px;
            position: absolute;
            left: 10px;
            top: 15px;
            z-index: 2;
        }

        .bs-vertical-wizard ul>li>a:after {
            content: '';
            position: absolute;
            border: 2px solid #bdc2ce;
            border-radius: 50%;
            top: 14px;
            left: 6px;
            width: 16px;
            height: 16px;
            z-index: 3;
        }

        .bs-vertical-wizard ul>li>a .desc {
            display: block;
            color: #bdc2ce;
            font-size: 11px;
            font-weight: 400;
            line-height: 1.8;
            letter-spacing: .8px;
        }

        .bs-vertical-wizard ul>li.complete>a:before {
            background-color: #5cb85c;
            opacity: 1;
            height: calc(100% - 25px);
            bottom: -9px;
        }

        .bs-vertical-wizard ul>li.complete>a:after {
            display: none;
        }

        .bs-vertical-wizard ul>li.locked>a:after {
            display: none;
        }

        .bs-vertical-wizard ul>li:last-child>a:before {
            display: none;
        }

        .bs-vertical-wizard ul>li.complete>a .ico {
            left: 8px;
        }

        .bs-vertical-wizard ul>li>a .ico.ico-green {
            color: #5cb85c;
        }

        .bs-vertical-wizard ul>li>a .ico.ico-muted {
            color: #bdc2ce;
        }

        .bs-vertical-wizard ul>li.current {
            background-color: #fff;
        }

        .bs-vertical-wizard ul>li.current>a:before {
            background-color: #ffe357;
            opacity: 1;
        }

        .bs-vertical-wizard ul>li.current>a:after {
            border-color: #ffe357;
            background-color: #ffe357;
            opacity: 1;
        }

        .bs-vertical-wizard ul>li.current:after,
        .bs-vertical-wizard ul>li.current:before {
            left: 100%;
            top: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
        }

        .bs-vertical-wizard ul>li.current:after {
            border-color: rgba(255, 255, 255, 0);
            border-left-color: #fff;
            border-width: 10px;
            margin-top: -10px;
        }

        .bs-vertical-wizard ul>li.current:before {
            border-color: rgba(234, 236, 241, 0);
            border-left-color: #eaecf1;
            border-width: 11px;
            margin-top: -11px;
        }

    </style>
    {{-- stepper --}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('assets/css/mdb.min.css') }}" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
        integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
        crossorigin="anonymous"></script>
    <style>
        .img-gallery-product img {
            width: 280px;
            height: 300px;
            filter: brightness(1);
        }

        .img-gallery-product img:hover {
            transition: all 0.2s ease-out 0s;
            filter: brightness(0.9);
        }

        .tx-w-space {
            white-space: pre-wrap;
            /* css-3 */
            white-space: -moz-pre-wrap;
            /* Mozilla, since 1999 */
            white-space: -pre-wrap;
            /* Opera 4-6 */
            white-space: -o-pre-wrap;
            /* Opera 7 */
            word-wrap: break-word;
            /* Internet Explorer 5.5+ */
        }

        textarea::-webkit-scrollbar {
            width: 3px;
            background-color: #F5F5F5;
        }

        textarea::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #1b84e7;
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .komen::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .komen {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .inp {
            border: none;
            border-bottom: 1px solid #1890ff;
            padding: 15px 30px;
            outline: none;
        }

        [placeholder]:focus::-webkit-input-placeholder {
            transition: text-indent 0.4s 0.4s ease;
            text-indent: -100%;
            opacity: 1;
        }

        @media screen and (max-width:500px) {

            .img-gallery-product img {
                max-width: 100px;
                max-height: 110px;
                justify-content: center;
                filter: brightness(1);
            }

            .img-gallery-product ul {
                grid-template-columns: 1fr 1fr
            }

            /* custom scroll-bar */
            .example::-webkit-scrollbar {
                display: none;
            }

            /* Hide scrollbar for IE, Edge and Firefox */
            .example {
                -ms-overflow-style: none;
                /* IE and Edge */
                scrollbar-width: none;
                /* Firefox */
            }

            /* my custome scroll-bar */
            .my-custom-scrollbar {
                position: relative;
                height: 500px;
                overflow: auto;
            }

            .table-wrapper-scroll-y {
                display: block;
            }

        }

    </style>
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <!--load all styles -->
    {{-- search --}}

</head>

<body class="mdb-skin-custom " data-mdb-spy="scroll" data-mdb-target="#scrollspy" data-mdb-offset="250" style="background-color: #f3f2ef;">
        
    @include('layouts.backend.partial.navigation')
    
    <main class="mt-4 d-lg-block container-lg">
        <div class="row">
            <div class="col-lg-4">
                @include('layouts.backend.partial.sidebar')

            </div>
            <div class="col-lg-8">
                @include('layouts.backend.partial.alert')
                @yield('content')
            </div>
        </div>
    </main>
    @include('layouts.backend.partial.footer')
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/mdb.min.js') }}"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="{{ asset('assets/js/admin.js') }}"></script>
    {{-- Dynamic input --}}

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        
        setInterval(function() {
           
        }, 1000);
        
        function scrollBot(){
            setInterval(function() {
                readChat();
        }, 1000);
        }
    </script>
    <style>
        #messages {
  height: 200px;
  overflow-y: auto;
}
    </style>
</body>

</html>
