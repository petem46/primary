<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FCAT Primary Reporting</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: #636b6f;
            }

            .links > a {
                color: #009B90;
                padding: 0 25px;
                font-size: 15px;
                font-weight: 1000;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }


            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <a href="/"><img class="img-fluid mb-5 d-block mx-auto" style="height: 145px;" src="FCAT-LOGO.jpg" alt=""></a>
                <div class="title m-b-md">
                    Primary Reporting
                </div>

                <div class="links">
                    <a href="analysis/Armfield">Armfield</a>
                    <a href="analysis/Gateway">Gateway</a>
                    <a href="analysis/Hambleton">Hambleton</a>
                    <a href="analysis/Mereside">Mereside</a>
                    <a href="analysis/Unity">Unity</a>
                    <a href="analysis/Westcliff">Westcliff</a>
                    <a href="analysis/Westminster">Westminster</a>
                </div>
            </div>
        </div>
    </body>
</html>
