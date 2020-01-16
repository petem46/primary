@extends('layouts.app')
@section('content')
@php

$startdate = new DateTime($student->filterstartdate);
$today = new DateTime(date("Y-m-d"));
$days = $startdate->diff($today)->days;
$timeOnRoll = floor($days/365) . ' years ' . floor(($days % 365) /30.5) . ' months';

$stable = true;

if ($student->year > 1) {
    if (floor($days/365) < 2) {
    $stable = false;
    }
}
if ($student->year === '1') {
    if (floor($days/365) < 1) {
    $stable = false;
    }
}

@endphp

<div class="container">
<section id="pupildetails" class="mb-0">
    <div class="photo">

    </div>
    <div class="name">
        <h4 class="text-muted font-weight-light">{{ucwords(strtolower($student->school))}}&nbsp;&nbsp;&nbsp;&nbsp;<small>Year {{$student->year}} </small> </h4>
        <h1 class="display-3">{{$student->pforename}} {{$student->psurname}}</h1>
        <p class="small text-muted m-0 font-weight-light">{{$student->upn}} </p>
    </div>
</section>
<hr>
<section id="groups" class="mb-3">
    <div class="d-none">
        <h1 class="text-primary"><i class="fas fa-users fa-fw fa-lg"></i>&nbsp;&nbsp;Groups</h1>
    </div>
    <div class="row">
        {{-- @if (!empty($student->year))
            <div class="col-6 col-lg-2 mb-2 mb-md-0">
                <div class="btn btn-sm btn-block btn-primary">Year {{$student->year}} </div>
            </div>
        @endif --}}
        @if ($student->genderlabel === 'Girls')
            <div class="col-6 col-lg-2 mb-2 mb-md-0">
                <div class="badge p-2 badge-pink"><i class="fas fa-female"></i>&nbsp;&nbsp;{{$student->genderlabel}} </div>
            </div>
        @endif
        @if ($student->genderlabel === 'Boys')
            <div class="col-6 col-lg-2 mb-2 mb-md-0">
                <div class="badge p-2 badge-blue"><i class="fas fa-male"></i>&nbsp;&nbsp;{{$student->genderlabel}} </div>
            </div>
        @endif
        @if ($student->pplabel === 'PP')
            <div class="col-6 col-lg-2 mb-2 mb-md-0">
                <div class="badge p-2 badge-purple"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;{{$student->pplabel}} </div>
            </div>
        @endif
        @if ($student->sendlabel != 'SEND N')
            <div class="col-6 col-lg-2 mb-2 mb-md-0">
                <div class="badge p-2 badge-indigo"><i class="far fa-address-card"></i>&nbsp;&nbsp;{{$student->sendlabel}} </div>
            </div>
        @endif
        @if ($stable)
            <div class="col-6 col-lg-2 mb-2 mb-md-0">
                <div class="badge p-2 badge-green"><i class="far fa-check-square"></i>&nbsp;&nbsp;Stable </div>
            </div>
        @endif
        @if (!$stable)
            <div class="col-6 col-lg-2 mb-2 mb-md-0">
                <div class="badge p-2 badge-warning"><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;Non Stable </div>
            </div>
        @endif
        @if (!empty($attendance[0]->PA))
            @if ($attendance[0]->PA = 1)
            <div class="col-6 col-lg-2 mb-2 mb-md-0">
                <div class="badge p-2 badge-danger"><i class="fas fa-exclamation-circle"></i></i>&nbsp;&nbsp;PA </div>
            </div>
            @endif
        @endif
    </div>
</section>
<hr>
<section id="enrolment" class="mb-3 align-middle">
    <div class="d-none">
        <h1 class="text-primary"><i class="fas fa-clipboard-list fa-fw fa-lg"></i>&nbsp;&nbsp;Enrolment</h1>
    </div>
    <div class="row">
        <div class="col-12 col-lg-3">
            Start Date: <strong>{{$student->startdate}}</strong>
        </div>
        <div class="col-12 col-lg-3">
            Time on roll: <strong>{{$timeOnRoll}}</strong>
        </div>
        <div class="col-12 col-lg-4">
            Status: <strong>{{$student->status}}</strong>
        </div>
    </div>
</section>
<hr>

@if (!empty($attendance[0]))
<section id="attendance">
    <div class="w-100">
        <h1 class="text-primary py-3">Attendance</h1>
    </div>
    <h4 class="font-weight-light text-primary"><i class="far fa-calendar-alt fa-fw fa-lg"></i>&nbsp;&nbsp;Overall Summary</h4>
    <div class="row">
        <div class="col-12 col-lg-6 order-lg-2 pb-3">
            <canvas id="myChart" ></canvas>
        </div>
        <div class="col-12 col-lg-6 order-lg-1 pb-3">
            <table class="table text-center table-sm small">
                <thead class="bg-dark text-white">
                    <th>Category</th>
                    <th class="">Sessions</th>
                    <th class="">Percent</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="bg-primary text-white">Present</td>
                        <td class="">{{$attendance[0]->present ?? ''}}</td>
                        <td class="">{{ round(($attendance[0]->present / $attendance[0]->possible) * 100,1)}}% </td>
                    </tr>
                    <tr>
                        <td class="bg-green text-white">AEA</td>
                        <td class="">{{$attendance[0]->aea}}</td>
                        <td class="">{{ round(($attendance[0]->aea / $attendance[0]->possible) * 100,1) . '%'}} </td>
                    </tr>
                    <tr>
                        <td class="bg-darkorange text-white">Absence</td>
                        <td class="">{{$attendance[0]->abs}}</td>
                        <td class="">{{ round(($attendance[0]->abs / $attendance[0]->possible) * 100,1)}}% </td>
                    </tr>
                    <tr>
                        <td class="bg-danger text-white">Unauthorised</td>
                        <td class="">{{$attendance[0]->uabs}}</td>
                        <td class="">{{ round(($attendance[0]->uabs / $attendance[0]->possible) * 100,1)}}% </td>
                    </tr>
                </tbody>
            </table>
            <section id="daily-attendace-table" class="mt-3">
                <h4 class="font-weight-light text-primary"><i class="far fa-list-alt fa-fw fa-lg"></i>&nbsp;&nbsp;Daily Breakdown</h4>
                <table class="table table-bordered table-sm small text-center">
                    <thead class="bg-dark text-white">
                        <th>Monday </th>
                        <th>Tuesday </th>
                        <th>Wednesday </th>
                        <th>Thursday </th>
                        <th>Friday </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bg-@if ($weekdayattendance[0]->pattendance <= 90)danger text-white @elseif ($weekdayattendance[0]->pattendance <=95)warning text-white @elseif ($weekdayattendance[0]->pattendance > 95)green text-white @endif">{{round($weekdayattendance[0]->pattendance,1) . '%'}} </td>
                            <td class="bg-@if ($weekdayattendance[1]->pattendance <= 90)danger text-white @elseif ($weekdayattendance[1]->pattendance <=95)warning text-white @elseif ($weekdayattendance[1]->pattendance > 95)green text-white @endif">{{round($weekdayattendance[1]->pattendance,1) . '%'}} </td>
                            <td class="bg-@if ($weekdayattendance[2]->pattendance <= 90)danger text-white @elseif ($weekdayattendance[2]->pattendance <=95)warning text-white @elseif ($weekdayattendance[2]->pattendance > 95)green text-white @endif">{{round($weekdayattendance[2]->pattendance,1) . '%'}} </td>
                            <td class="bg-@if ($weekdayattendance[3]->pattendance <= 90)danger text-white @elseif ($weekdayattendance[3]->pattendance <=95)warning text-white @elseif ($weekdayattendance[3]->pattendance > 95)green text-white @endif">{{round($weekdayattendance[3]->pattendance,1) . '%'}} </td>
                            <td class="bg-@if ($weekdayattendance[4]->pattendance <= 90)danger text-white @elseif ($weekdayattendance[4]->pattendance <=95)warning text-white @elseif ($weekdayattendance[4]->pattendance > 95)green text-white @endif">{{round($weekdayattendance[4]->pattendance,1) . '%'}} </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    <div class="row">
        <div id="weekly-running-attendance" class="col-12">
            <h4 class="font-weight-light text-primary"><i class="far fa-chart-bar fa-fw fa-lg"></i>&nbsp;&nbsp;Weekly Breakdown / Running Total </h4>
            <table class="table table-bordered table-striped  table-sm small text-center">
                <thead class="bg-dark text-white">
                    <th>Week</th>
                    <th>Sessions<br>Present</th>
                    <th>Sessions<br>Possible</th>
                    <th>% Attendance</th>
                    <th>Running<br>Present</th>
                    <th>Running<br>Possible</th>
                    <th>Running<br>% Attendance</th>
                </thead>
                <tbody>
                    @foreach ($weeklyrunningattendance as $week)
                        <tr>
                            <td>{{$week->wk}} </td>
                            <td>{{$week->present}} </td>
                            <td>{{$week->possible}} </td>
                            <td>{{round($week->pattendance,1) . '%' ?? ''}} </td>
                            <td>{{$week->RunningPresent}} </td>
                            <td>{{$week->RunningPossible}} </td>
                            <td>{{round($week->RunningPercent,1) . '%' ?? ''}} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<hr>
@endif


<section id="attainment" class="mb-3">
    <div>
        <h1 class="text-primary py-3">Attainment</h1>
    </div>
    <h4 class="font-weight-light text-primary"><i class="fas fa-child fa-fw"></i>&nbsp;&nbsp;Prior Attainment</h4>
    <div class="row text-center mb-3">
        @if(isset($ppa->GLD))
        <div class="col-6 col-lg-2 mb-2">
            <div class="badge badge-{{$ppa->GLD ?? ' border-light'}} p-2">
                GLD {{$ppa->GLD  ?? '' }}
            </div>
        </div>
        @endif
        @if(isset($ppa->Y1Phonics))
        <div class="col-6 col-lg-2 mb-2">
            <div class="badge badge-{{$ppa->Y1Phonics ?? ' border-light'}} p-2">
                Y1 Phonics {{$ppa->Y1Phonics  ?? '' }}
            </div>
        </div>
        @endif
        @if(isset($ppa->Y2Phonics))
        <div class="col-6 col-lg-2 mb-2">
            <div class="badge badge-{{$ppa->Y2Phonics ?? ' border-light'}} p-2">
                Y2 Phonics {{$ppa->Y2Phonics ?? '' }}
            </div>
        </div>
        @endif
        @if(isset($ppa->KS1Reading))
        <div class="col-6 col-lg-2 mb-2">
            <div class="badge badge-{{$ppa->KS1Reading  ?? ' border-light'}} p-2">
                KS1 Reading {{$ppa->KS1Reading  ?? '' }}
            </div>
        </div>
        @endif
        @if(isset($ppa->KS1Maths))
        <div class="col-6 col-lg-2 mb-2">
            <div class="badge badge-{{$ppa->KS1Maths  ?? ' border-light'}} p-2">
                KS1 Maths {{$ppa->KS1Maths  ?? '' }}
            </div>
        </div>
        @endif
        @if(isset($ppa->KS1Writing))
        <div class="col-6 col-lg-2 mb-2">
            <div class="badge badge-{{$ppa->KS1Writing  ?? ' border-light'}} p-2">
                KS1 Writing {{$ppa->KS1Writing  ?? '' }}
            </div>
        </div>
        @endif
    </div>

    {{-- DISPLAY KEY STAGE 2 PRIOR ATTAINMENT IF YEAR 7 OR ABOVE --}}
    @if($student->year >= 7 )
    {{-- START OF KEY STAGE 2 PRIOR ATTAINMENT SECTION --}}
    <section id="ks2badges" class="">
    {{-- <h6>Key Stage 2</h6> --}}
    <div class="row text-center mb-3">
        @if(isset($ppa->KS2Reading))
        <div class="col-6 col-lg-2 mb-2">
            <div class="badge badge-{{$ppa->KS2Reading ?? ' border-light'}}  @if($ppa->KS2Reading >= 110) badge-GDS @elseif ($ppa->KS2Reading >= 100) badge-EXS @elseif ($ppa->KS2Reading >= 95) badge-WTS @elseif ($ppa->KS2Reading > 75) badge-danger @endif p-2">
                KS2 Reading {{$ppa->KS2Reading  ?? '' }}
            </div>
        </div>
        @endif
        @if(isset($ppa->KS2Maths))
        <div class="col-6 col-lg-2 mb-2">
            <div class="badge badge-{{$ppa->KS2Maths  ?? ' border-light'}} @if($ppa->KS2Maths >= 110) badge-GDS @elseif ($ppa->KS2Maths >= 100) badge-EXS @elseif ($ppa->KS2Maths >= 95) badge-WTS @elseif ($ppa->KS2Maths > 75) badge-danger @endif p-2">
                KS2 Maths {{$ppa->KS2Maths  ?? '' }}
            </div>
        </div>
        @endif
        @if(isset($ppa->KS2Writing))
        <div class="col-6 col-lg-2 mb-2">
            <div class="badge badge-{{$ppa->KS2Writing  ?? ' border-light'}}  @if($ppa->KS2Writing >= 110) badge-GDS @elseif ($ppa->KS2Writing >= 100) badge-EXS @elseif ($ppa->KS2Writing >= 95) badge-WTS @elseif ($ppa->KS2Writing > 75) badge-danger @endif p-2">
                KS2 Writing {{$ppa->KS2Writing  ?? '' }}
            </div>
        </div>
        @endif
    </div>
    </section>
    {{-- END OF KEY STAGE 2 PRIOR ATTAINMENT SECTION --}}
    @endif
    <section id="ks1-dcdata-table" class="d-none">
    <h4 class="font-weight-light text-primary"><i class="fas fa-chart-line fa-fw"></i></i>&nbsp;&nbsp;Tracking Data</h4>
    <table class="table text-center table-bordered table-striped table-hover table-sm small">
        <thead class="bg-dark text-white">
            <th class="text-left">Subject</th>
            <th>Y1 DC1</th>
            <th>Y1 DC2</th>
            <th>Y1 DC3</th>
            <th>Y1 DC4</th>
            <th>Y2 DC1</th>
            <th>Y2 DC2</th>
            <th>Y2 DC3</th>
            <th>Y2 DC4</th>
        </thead>
        <tbody>
            @foreach ($primarydcdata as $subject)
            <tr>
                <td class="text-left">{{$subject->subject}}</td>
                <td class="text-{{$subject->Y1DC1}}">{{$subject->Y1DC1}}</td>
                <td class="text-{{$subject->Y1DC2}}">{{$subject->Y1DC2}}</td>
                <td class="text-{{$subject->Y1DC3}}">{{$subject->Y1DC3}}</td>
                <td class="text-{{$subject->Y1DC4}}">{{$subject->Y1DC4}}</td>
                <td class="text-{{$subject->Y2DC1}}">{{$subject->Y2DC1}}</td>
                <td class="text-{{$subject->Y2DC2}}">{{$subject->Y2DC2}}</td>
                <td class="text-{{$subject->Y2DC3}}">{{$subject->Y2DC3}}</td>
                <td class="text-{{$subject->Y2DC4}}">{{$subject->Y2DC4}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </section>
    {{-- DISPLAY KEY STAGE 2 TRACKING DATA IF CURRENTLY IN YEAR 3 - 6 --}}
    @if($student->year >= 3 && $student->year <= 6)
    {{-- START OF KEY STAGE 2 TRACKING DATA --}}
    <section id="ks2-dcdata-table">
        <h4 class="font-weight-light text-primary"><i class="fas fa-chart-line fa-fw"></i></i>&nbsp;&nbsp;Tracking Data</h4>
        <table class="table text-center table-bordered table-striped table-hover table-sm small">
        <thead class="bg-dark text-white">
            <th class="text-left">Subject</th>
            <th>Y3 DC1</th>
            <th>Y3 DC2</th>
            <th>Y3 DC3</th>
            <th>Y3 DC4</th>
            <th>Y4 DC1</th>
            <th>Y4 DC2</th>
            <th>Y4 DC3</th>
            <th>Y4 DC4</th>
            <th>Y5 DC1</th>
            <th>Y5 DC2</th>
            <th>Y5 DC3</th>
            <th>Y5 DC4</th>
            <th>Y6 DC1</th>
            <th>Y6 DC2</th>
            <th>Y6 DC3</th>
        </thead>
        <tbody>
            @foreach ($primarydcdata as $subject)
            <tr>
                <td class="text-left">{{$subject->subject}}</td>
                <td class="bg-@if($subject->Y3DC1 >= 7)yellow @elseif ($subject->Y3DC1 >= 4)success text-white @elseif ($subject->Y3DC1 > 1)warning text-white @elseif ($subject->Y3DC1 === "1")danger text-white @endif ">{{$subject->Y3DC1}}</td>
                <td class="bg-@if($subject->Y3DC2 >= 7)yellow @elseif ($subject->Y3DC2 >= 4)success text-white @elseif ($subject->Y3DC2 > 1)warning text-white @elseif ($subject->Y3DC2 === "1")danger text-white @endif ">{{$subject->Y3DC2}}</td>
                <td class="bg-@if($subject->Y3DC3 >= 7)yellow @elseif ($subject->Y3DC3 >= 4)success text-white @elseif ($subject->Y3DC3 > 1)warning text-white @elseif ($subject->Y3DC3 === "1")danger text-white @endif ">{{$subject->Y3DC3}}</td>
                <td class="bg-@if($subject->Y3DC4 >= 7)yellow @elseif ($subject->Y3DC4 >= 4)success text-white @elseif ($subject->Y3DC4 > 1)warning text-white @elseif ($subject->Y3DC4 === "1")danger text-white @endif ">{{$subject->Y3DC4}}</td>
                <td class="bg-@if($subject->Y4DC1 >= 7)yellow @elseif ($subject->Y4DC1 >= 4)success text-white @elseif ($subject->Y4DC1 > 1)warning text-white @elseif ($subject->Y4DC1 === "1")danger text-white @endif ">{{$subject->Y4DC1}}</td>
                <td class="bg-@if($subject->Y4DC2 >= 7)yellow @elseif ($subject->Y4DC2 >= 4)success text-white @elseif ($subject->Y4DC2 > 1)warning text-white @elseif ($subject->Y4DC2 === "1")danger text-white @endif ">{{$subject->Y4DC2}}</td>
                <td class="bg-@if($subject->Y4DC3 >= 7)yellow @elseif ($subject->Y4DC3 >= 4)success text-white @elseif ($subject->Y4DC3 > 1)warning text-white @elseif ($subject->Y4DC3 === "1")danger text-white @endif ">{{$subject->Y4DC3}}</td>
                <td class="bg-@if($subject->Y4DC4 >= 7)yellow @elseif ($subject->Y4DC4 >= 4)success text-white @elseif ($subject->Y4DC4 > 1)warning text-white @elseif ($subject->Y4DC4 === "1")danger text-white @endif ">{{$subject->Y4DC4}}</td>
                <td class="bg-@if($subject->Y5DC1 >= 7)yellow @elseif ($subject->Y5DC1 >= 4)success text-white @elseif ($subject->Y5DC1 > 1)warning text-white @elseif ($subject->Y5DC1 === "1")danger text-white @endif ">{{$subject->Y5DC1}}</td>
                <td class="bg-@if($subject->Y5DC2 >= 7)yellow @elseif ($subject->Y5DC2 >= 4)success text-white @elseif ($subject->Y5DC2 > 1)warning text-white @elseif ($subject->Y5DC2 === "1")danger text-white @endif ">{{$subject->Y5DC2}}</td>
                <td class="bg-@if($subject->Y5DC3 >= 7)yellow @elseif ($subject->Y5DC3 >= 4)success text-white @elseif ($subject->Y5DC3 > 1)warning text-white @elseif ($subject->Y5DC3 === "1")danger text-white @endif ">{{$subject->Y5DC3}}</td>
                <td class="bg-@if($subject->Y5DC4 >= 7)yellow @elseif ($subject->Y5DC4 >= 4)success text-white @elseif ($subject->Y5DC4 > 1)warning text-white @elseif ($subject->Y5DC4 === "1")danger text-white @endif ">{{$subject->Y5DC4}}</td>
                <td class="bg-@if($subject->Y6DC1 >= 7)yellow @elseif ($subject->Y6DC1 >= 4)success text-white @elseif ($subject->Y6DC1 > 1)warning text-white @elseif ($subject->Y6DC1 === "1")danger text-white @endif ">{{$subject->Y6DC1}}</td>
                <td class="bg-@if($subject->Y6DC2 >= 7)yellow @elseif ($subject->Y6DC2 >= 4)success text-white @elseif ($subject->Y6DC2 > 1)warning text-white @elseif ($subject->Y6DC2 === "1")danger text-white @endif ">{{$subject->Y6DC2}}</td>
                <td class="bg-@if($subject->Y6DC3 >= 7)yellow @elseif ($subject->Y6DC3 >= 4)success text-white @elseif ($subject->Y6DC3 > 1)warning text-white @elseif ($subject->Y6DC3 === "1")danger text-white @endif ">{{$subject->Y6DC3}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </section>
    {{-- END KEY STAGE 2 TRACKING DATA --}}
    @endif
    {{-- DISPLAY KEY STAGE 3 TRACKING DATA --}}
    <section id="ks3-dcdata-table">
        {{-- START OF KEY STAGE 3 TRACKING DATA --}}
        @if($student->year >= 7)
        <h4 class="font-weight-light text-primary"><i class="fas fa-chart-line fa-fw"></i></i>&nbsp;&nbsp;KS3 Tracking Data</h4>
        <div class="table-responsive">
            <table class="table text-center table-bordered table-striped table-hover table-sm small">
                <thead class="bg-dark text-white">
                    <th class="text-left">Subject</th>
                    <th>Y7 DC1</th>
                    <th>Y7 DC2</th>
                    <th>Y7 DC3</th>
                    <th>Y7 DC4</th>
                    <th>Y8 DC1</th>
                    <th>Y8 DC2</th>
                    <th>Y8 DC3</th>
                    <th>Y8 DC4</th>
                    <th>Y9 DC1</th>
                    <th>Y9 DC2</th>
                    <th>Y9 DC3</th>
                    <th>Y9 DC4</th>
                </thead>
                <tbody>
                    @foreach ($secondarydcdata as $subject)
                    <tr>
                        <td class="text-left">{{$subject->subject}}</td>
                        <td class="bg-@if($subject->Y7DC1 === "A")yellow @elseif ($subject->Y7DC1 === "O")success text-white @elseif ($subject->Y7DC1 === "B")warning text-white @elseif ($subject->Y7DC1 === "C")danger text-white @endif ">{{$subject->Y7DC1}}</td>
                        <td class="bg-@if($subject->Y7DC2 === "A")yellow @elseif ($subject->Y7DC2 === "O")success text-white @elseif ($subject->Y7DC2 === "B")warning text-white @elseif ($subject->Y7DC2 === "C")danger text-white @endif ">{{$subject->Y7DC2}}</td>
                        <td class="bg-@if($subject->Y7DC3 === "A")yellow @elseif ($subject->Y7DC3 === "O")success text-white @elseif ($subject->Y7DC3 === "B")warning text-white @elseif ($subject->Y7DC3 === "C")danger text-white @endif ">{{$subject->Y7DC3}}</td>
                        <td class="bg-@if($subject->Y7DC4 === "A")yellow @elseif ($subject->Y7DC4 === "O")success text-white @elseif ($subject->Y7DC4 === "B")warning text-white @elseif ($subject->Y7DC4 === "C")danger text-white @endif ">{{$subject->Y7DC4}}</td>
                        <td class="bg-@if($subject->Y8DC1 === "A")yellow @elseif ($subject->Y8DC1 === "O")success text-white @elseif ($subject->Y8DC1 === "B")warning text-white @elseif ($subject->Y8DC1 === "C")danger text-white @endif ">{{$subject->Y8DC1}}</td>
                        <td class="bg-@if($subject->Y8DC2 === "A")yellow @elseif ($subject->Y8DC2 === "O")success text-white @elseif ($subject->Y8DC2 === "B")warning text-white @elseif ($subject->Y8DC2 === "C")danger text-white @endif ">{{$subject->Y8DC2}}</td>
                        <td class="bg-@if($subject->Y8DC3 === "A")yellow @elseif ($subject->Y8DC3 === "O")success text-white @elseif ($subject->Y8DC3 === "B")warning text-white @elseif ($subject->Y8DC3 === "C")danger text-white @endif ">{{$subject->Y8DC3}}</td>
                        <td class="bg-@if($subject->Y8DC4 === "A")yellow @elseif ($subject->Y8DC4 === "O")success text-white @elseif ($subject->Y8DC4 === "B")warning text-white @elseif ($subject->Y8DC4 === "C")danger text-white @endif ">{{$subject->Y8DC4}}</td>
                        <td class="bg-@if($subject->Y9DC1 === "A")yellow @elseif ($subject->Y9DC1 === "O")success text-white @elseif ($subject->Y9DC1 === "B")warning text-white @elseif ($subject->Y9DC1 === "C")danger text-white @endif ">{{$subject->Y9DC1}}</td>
                        <td class="bg-@if($subject->Y9DC2 === "A")yellow @elseif ($subject->Y9DC2 === "O")success text-white @elseif ($subject->Y9DC2 === "B")warning text-white @elseif ($subject->Y9DC2 === "C")danger text-white @endif ">{{$subject->Y9DC2}}</td>
                        <td class="bg-@if($subject->Y9DC3 === "A")yellow @elseif ($subject->Y9DC3 === "O")success text-white @elseif ($subject->Y9DC3 === "B")warning text-white @elseif ($subject->Y9DC3 === "C")danger text-white @endif ">{{$subject->Y9DC3}}</td>
                        <td class="bg-@if($subject->Y9DC4 === "A")yellow @elseif ($subject->Y9DC4 === "O")success text-white @elseif ($subject->Y9DC4 === "B")warning text-white @elseif ($subject->Y9DC4 === "C")danger text-white @endif ">{{$subject->Y9DC4}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </section>
    <hr>
</div>

<script>

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Present', 'AEA', 'Absence', 'Unauthorised Abs'],
            datasets: [{
                // label: 'Sessions',
                data: [
                    {{$attendance[0]->present ?? ''}},
                    {{$attendance[0]->aea ?? ''}},
                    {{$attendance[0]->abs ?? ''}},
                    {{$attendance[0]->uabs ?? ''}}
                ],
                backgroundColor: [
                    '#00615A',
                    '#38c172',
                    'darkorange',
                    'crimson'
                ],
                borderColor: [
                    'white',
                    'white',
                    'white',
                    'white'
                ],
                borderWidth: 1
            }]
        },
        options: {
            cutoutPercentage: 60,
            animation: {
                animateScale: false,
            },
            legend: {
                display: false,
                // position: 'right',
            },
            plugins: {
                datalabels: {
                    formatter: (value, ctx) => {
                        let sum = ctx.dataset._meta[0].total;
                        let percentage = (value * 100 / sum).toFixed(1) + "%";
                        if (value/sum < 0.1) {
                            let percentage = '';
                            return percentage;
                        }
                        if (value/sum >= 0.1) {
                            return percentage;
                        }
                    },
                    color: [
                        'white',
                        'white',
                        'white',
                        'white',
                    ],
                    font: {
                        size: [
                            '16'
                        ],
                    }
                },
            },
            tooltips: {
                enabled: false,
            },
            responsive: true,
            responsiveAnimationDuration: 500,
        }
    });

</script>

@endsection
