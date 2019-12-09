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
                <a href="/"><img class="img-fluid mb-5 d-block mx-auto" style="height: 145px;" src="../FCAT-LOGO.jpg" alt=""></a>
                <div class="title m-b-md">
                    {{$school}} Reporting
                </div>
                {{-- <hr> --}}
                <div class="links">
                    <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fCoreSubjectSummaryByYear1&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                        Core Subject Summary by Year
                    </a><p style="margin-bottom: 5px;"></p>
                    <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fSubjectSummaryByYear1&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                        Subject Summary by Year
                    </a><p style="margin-bottom: 5px;"></p>
                    <hr>
                    <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fSubjectSummaryBySchool1&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                        Whole School Overview
                    </a><p style="margin-bottom: 5px;"></p>
                    <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fSchoolSubjectSummaryGender1&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                        Whole School Overview (Girl/Boy)
                    </a><p style="margin-bottom: 5px;"></p>
                    <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fSchoolSubjectSummaryPP1&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                        Whole School Overview (PP)
                    </a><p style="margin-bottom: 5px;"></p>
                    <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fSchoolSubjectSummarySEND1&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                        Whole School Overview (SEND)
                    </a><p style="margin-bottom: 5px;"></p>
                    <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fSchoolSubjectSummaryEAL1&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                        Whole School Overview (EAL)
                    </a><p style="margin-bottom: 5px;"></p>
                    <hr>
                    <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fYearSubjectSummary1&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                        Subject Overview by Year
                    </a><p style="margin-bottom: 5px;"></p>
                    <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fYearSubjectSummaryGender1&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                        Subject Overview by Year (Girl/Boy)
                    </a><p style="margin-bottom: 5px;"></p>
                    <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fYearSubjectSummaryPP1&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                        Subject Overview by Year (PP)
                    </a><p style="margin-bottom: 5px;"></p>
                    <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fYearSubjectSummarySEND1&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                        Subject Overview by Year (SEND)
                    </a><p style="margin-bottom: 5px;"></p>
                    <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fYearSubjectSummaryEAL1&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                        Subject Overview by Year (EAL)
                    </a><p style="margin-bottom: 5px;"></p>
                </div>

            </div>
        </div>
    </body>
</html>
