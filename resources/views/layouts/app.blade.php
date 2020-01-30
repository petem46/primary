<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-client_id" content="395925343817-rl1c5101ak70lctt9gakrqb7ap3j69o3.apps.googleusercontent.com">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FCAT Focus</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }} defer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.14.0/dist/sweetalert2.all.min.js"></script>

    <!-- Data Tables Plugin -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

    {{-- ChartJS --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/0.5.5/chartjs-plugin-annotation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.14.0/dist/sweetalert2.min.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.14.0/dist/sweetalert2.all.min.js"></script>
    <script src="{{URL::asset('js/swal.js')}}"></script>
    <div id="app">

        @include('layouts.nav')
        <main class="my-4">

            @yield('content')
        </main>
        @include('layouts.footer')
    </div>

</body>
<script src="{{URL::asset('js/goback.js')}}"></script>
</html>
