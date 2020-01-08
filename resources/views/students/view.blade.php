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
<section id="pupildetails" class="mb-5">
    <div class="photo">

    </div>
    <div class="name">
        <h4 class="text-muted">{{ucwords(strtolower($student->school))}}&nbsp;&nbsp;&nbsp;&nbsp;<small>Year {{$student->year}} </small> </h4>
        <h1>{{ucwords(strtolower($student->pforename))}} {{ucwords(strtolower($student->psurname))}}</h1>
    </div>
</section>
<section id="groups" class="mb-5">
    <div>
        <h4>Groups</h4>
    </div>
    <div class="row">
        {{-- @if (!empty($student->year))
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <div class="btn btn-sm btn-block btn-primary">Year {{$student->year}} </div>
            </div>
        @endif --}}
        @if ($student->genderlabel === 'Girls')
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <div class="btn btn-sm btn-block btn-pink"><i class="fas fa-female"></i>&nbsp;&nbsp;{{$student->genderlabel}} </div>
            </div>
        @endif
        @if ($student->genderlabel === 'Boys')
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <div class="btn btn-sm btn-block btn-blue"><i class="fas fa-male"></i>&nbsp;&nbsp;{{$student->genderlabel}} </div>
            </div>
        @endif
        @if ($student->pplabel === 'PP')
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <div class="btn btn-sm btn-block btn-purple">{{$student->pplabel}} </div>
            </div>
        @endif
        @if ($student->sendlabel != 'SEND N')
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <div class="btn btn-sm btn-block btn-indigo">{{$student->sendlabel}} </div>
            </div>
        @endif
        @if ($stable)
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <div class="btn btn-sm btn-block btn-green"><i class="far fa-check-square"></i>&nbsp;&nbsp;Stable </div>
            </div>
        @endif
        @if (!$stable)
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <div class="btn btn-sm btn-block btn-warning"><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;Non Stable </div>
            </div>
        @endif
        @if (!empty($attendance[0]->PA))
            @if ($attendance[0]->PA = 1)
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <div class="btn btn-sm btn-block btn-danger"><i class="fas fa-exclamation-circle"></i></i>&nbsp;&nbsp;PA </div>
            </div>
            @endif
        @endif
    </div>
</section>
<section id="enrolment" class="mb-5">
    <div>
        <h4>Enrolment</h4>
    </div>
    <div class="row">
        <div class="col-12 col-lg-3">
            <p>Status: <strong>{{$student->status}}</strong></p>
        </div>
        <div class="col-12 col-lg-3">
            <p>Start Date: <strong>{{$student->startdate}}</strong></p>
        </div>
        <div class="col-12 col-lg-3">
            <p>Time on roll: <strong>{{$timeOnRoll}}</strong></p>
        </div>
    </div>
</section>

<section id="attainment" class="mb-5">
    <div>
        <h4>Attainment</h4>
    </div>
    <h6>EYFS</h6>
    <div class="row text-center mb-3">
        <div class="col-6 col-md-3 mb-2">
            <div class="btn btn-primary btn-block btn-sm">
                GLD - Yes
            </div>
        </div>
        <div class="col-6 col-md-3 mb-2">
            <div class="btn btn-primary btn-block btn-sm">
                Y1 Phonics - Yes
            </div>
        </div>
        <div class="col-6 col-md-3 mb-2">
            <div class="btn btn-light btn-block btn-sm">
                Y2 Phonics - N/A
            </div>
        </div>
    </div>
    <h6>Key Stage 1</h6>
    <div class="row text-center mb-3">
        <div class="col-6 col-md-3 mb-2">
            <div class="btn btn-primary btn-block btn-sm">
                KS1 Reading - EXS
            </div>
        </div>
        <div class="col-6 col-md-3 mb-2">
            <div class="btn btn-warning btn-block btn-sm">
                KS1 Maths - WTS
            </div>
        </div>
        <div class="col-6 col-md-3 mb-2">
            <div class="btn btn-primary btn-block btn-sm">
                KS1 Writing - EXS
            </div>
        </div>
    </div>
    <h6>Key Stage 2</h6>
    <div class="row text-center mb-3">
        <div class="col-6 col-md-3 mb-2">
            <div class="btn btn-primary btn-block btn-sm">
                KS2 Reading
            </div>
        </div>
        <div class="col-6 col-md-3 mb-2">
            <div class="btn btn-primary btn-block btn-sm">
                KS2 Maths
            </div>
        </div>
        <div class="col-6 col-md-3 mb-2">
            <div class="btn btn-primary btn-block btn-sm">
                KS2 Writing
            </div>
        </div>
    </div>

</section>

<section id="attendance">
    <div class="w-100">
        <h4>Attendance</h4>
    </div>
    <div class="row vh-50">
        <div class="col-12 col-lg-6 order-lg-2 pb-3">
            <canvas id="myChart" ></canvas>
        </div>
        <div class="col-12 col-lg-6 order-lg-1 pb-3">
            <table class="table">
                <thead>
                    <th>Category</th>
                    <th class="text-center">Sessions</th>
                    <th class="text-center">Percent</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="bg-primary text-white">Present</td>
                        <td class="text-center">{{$attendance[0]->present}}</td>
                        <td class="text-center">{{ round(($attendance[0]->present / $attendance[0]->possible) * 100,1)}}% </td>
                    </tr>
                    <tr>
                        <td class="bg-green text-white">AEA</td>
                        <td class="text-center">{{$attendance[0]->aea}}</td>
                        <td class="text-center">{{ round(($attendance[0]->aea / $attendance[0]->possible) * 100,1)}}% </td>
                    </tr>
                    <tr>
                        <td class="bg-darkorange text-white">Absence</td>
                        <td class="text-center">{{$attendance[0]->abs}}</td>
                        <td class="text-center">{{ round(($attendance[0]->abs / $attendance[0]->possible) * 100,1)}}% </td>
                    </tr>
                    <tr>
                        <td class="bg-red text-white">Unauthorised</td>
                        <td class="text-center">{{$attendance[0]->uabs}}</td>
                        <td class="text-center">{{ round(($attendance[0]->uabs / $attendance[0]->possible) * 100,1)}}% </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

</div>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Present', 'AEA', 'Absence', 'Unauthorised Abs'],
            datasets: [{
                label: '# of Votes',
                data: [
                    {{$attendance[0]->present}},
                    {{$attendance[0]->aea}},
                    {{$attendance[0]->abs}},
                    {{$attendance[0]->uabs}}
                ],
                backgroundColor: [
                    '#00615A',
                    '#38c172',
                    'darkorange',
                    '#e3342f'
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
            animation: {
                animateScale: false,
            },
            legend: {
                display: false,
                // position: 'right',
            },
            responsive: true,
            responsiveAnimationDuration: 500,
        }
    });
</script>

@endsection
