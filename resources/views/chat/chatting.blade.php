@extends('test.main')
@section('title')
    Kotak Masuk
@endsection

@section('style')
  <link rel="stylesheet" href="{{ asset('assets/css/chat.css') }}">
  @livewireStyles
@endsection

@section('main-content')
    @livewire('message')
@endsection


@section('script')
    @livewireScripts
@endsection
