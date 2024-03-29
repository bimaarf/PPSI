<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>User | Dashboard</title>
    <link rel="icon" href="" type="image/x-icon">
    <link rel="manifest" href="/manifest.json">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('assets/css/mdb.min.css') }}" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}" />
    {{-- <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet"> <!--load all styles --> --}}

</head>

<body class="mdb-skin-custom " data-mdb-spy="scroll" data-mdb-target="#scrollspy" data-mdb-offset="250" style="background-color: #f3f2ef;">

         @include('layouts.backend.partial.navigation')
        <div class="container pt-4">
            @yield('content')
        </div>
        @include('layouts.backend.partial.footer')
    <script type="text/javascript" src="{{ asset('assets/js/mdb.min.js') }}"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="{{ asset('assets/js/admin.js') }}"></script>
    {{-- Dynamic input --}}

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
        integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append(
                '<tr><td><select class="form-select form-select-lg" name="tujuan[]" id="tujuan">@foreach ($zone as $item)<option value="{{ $item->zone }}">{{ $item->zone }}</option>@endforeach</select></td><td><input type="text" name="nama_penerima[]" class="form-control mt-1" placeholder="Nama Penerima" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Del</button></td></tr><tr><td><input type="text" name="alamat_tujuan[]" placeholder="Alamat Lengkap" class="form-control mt-1" /></td><td><input type="num" name="telp_tujuan[]" class="form-control mt-1" placeholder="628XXXXX"></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Del</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });
    </script>

</body>

</html>
