<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FCAT Primary Reporting</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.14.0/dist/sweetalert2.min.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.14.0/dist/sweetalert2.all.min.js"></script>
    <script src="{{URL::asset('js/swal.js')}}"></script>
    <div id="app">
        @include('layouts.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer class="footer mt-auto bg-info shadow-sm footer justify-content-between">
    {{-- <footer class="navbar navbar-dark navbar-expand-md bg-primary shadow-sm footer justify-content-between"> --}}
    <div class="col-3">
            {{-- {{ HTML::image('img/whitemonkey64.png', 'alt text', array('style' => 'height: 46px')) }} --}}
            <img class="" src="{{URL::asset('/img/whitemonkey64.png')}}" alt="" style="height: 46px;">
            <a href="http://petem46.info" target="_blank">thedatamonkeys.co.uk</a>
        </div>
        <div class="col-3 text-center">Data Protection Toolkit</div>
        <div class="col-3 text-right">© 2018 <a href="mailto:petem46@gmail.com" target="_blank">petem46.info</a></div>
    </footer>

</body>
<script src="{{URL::asset('js/goback.js')}}"></script>
@if (Request::is('processors/*'))
    <script src="{{URL::asset('js/fileUploadProcessor.js')}}"></script>
@endif
@if (Request::is('breachresponses/*'))
    <script src="{{URL::asset('js/fileUploadResponse.js')}}"></script>
@endif
@if (Request::is('foirequests/*'))
    <script src="{{URL::asset('js/fileUploadResponse.js')}}"></script>
@endif
@if (Request::is('foiresponses/*'))
    <script src="{{URL::asset('js/fileUploadResponse.js')}}"></script>
@endif
</html>
