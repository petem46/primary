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

</body>
<script src="{{URL::asset('js/goback.js')}}"></script>
</html>
