<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    
    {{-- Page title --}}
    <title>
        @yield('title')
    </title>

    {{-- Brand style --}}
    <link rel="stylesheet" href="{{ asset('assets/css/brand.css') }}">

    {{-- Header style --}}
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">

    {{-- Isi Stye --}}
    <link rel="stylesheet" href="{{ asset('assets/css/isi.css') }}">
    
    {{-- Page style --}}
    @yield('style')

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">
</head>
<body>
    {{-- Header & Navbar --}}
    @include('test.partial.header')

    {{-- Content --}}
    <main class="content">

        {{-- Sidebar --}}
        @include('test.partial.sidebar')

        {{-- Main Content --}}
        @yield('main-content')
    </main>

    {{-- Header script --}}
    <script src="{{ asset('assets/js/header.js') }}"></script>

    {{-- Jquery --}}
    <script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>

    {{-- Page script --}}
    @yield('script')
</body>
</html>