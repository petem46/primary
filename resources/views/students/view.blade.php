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
<section id="pupildetails" class="mb-3">
    <div class="photo">

    </div>
    <div class="name">
        <h4 class="text-muted font-weight-light">{{ucwords(strtolower($student->school))}}&nbsp;&nbsp;&nbsp;&nbsp;<small>Year {{$student->year}} </small> </h4>
        <h1 class="display-3">{{$student->pforename}} {{$student->psurname}}</h1>
    </div>
</section>
<hr>
<section id="groups" class="mb-3">
    <div class="d-none">
        <h1 class="text-primary"><i class="fas fa-users fa-fw fa-lg"></i>&nbsp;&nbsp;Groups</h1>
    </div>
    <div class="row">
        {{-- @if (!empty($student->year))
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <div class="btn btn-sm btn-block btn-primary">Year {{$student->year}} </div>
            </div>
        @endif --}}
        @if ($student->genderlabel === 'Girls')
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <div class="badge p-2 badge-pink"><i class="fas fa-female"></i>&nbsp;&nbsp;{{$student->genderlabel}} </div>
            </div>
        @endif
        @if ($student->genderlabel === 'Boys')
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <div class="badge p-2 badge-blue"><i class="fas fa-male"></i>&nbsp;&nbsp;{{$student->genderlabel}} </div>
            </div>
        @endif
        @if ($student->pplabel === 'PP')
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <div class="badge p-2 badge-purple"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;{{$student->pplabel}} </div>
            </div>
        @endif
        @if ($student->sendlabel != 'SEND N')
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <div class="badge p-2 badge-indigo"><i class="far fa-address-card"></i>&nbsp;&nbsp;{{$student->sendlabel}} </div>
            </div>
        @endif
        @if ($stable)
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <div class="badge p-2 badge-green"><i class="far fa-check-square"></i>&nbsp;&nbsp;Stable </div>
            </div>
        @endif
        @if (!$stable)
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <div class="badge p-2 badge-warning"><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;Non Stable </div>
            </div>
        @endif
        @if (!empty($attendance[0]->PA))
            @if ($attendance[0]->PA = 1)
            <div class="col-6 col-md-2 mb-2 mb-md-0">
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
            Status: <strong>{{$student->status}}</strong>
        </div>
        <div class="col-12 col-lg-3">
            Start Date: <strong>{{$student->startdate}}</strong>
        </div>
        <div class="col-12 col-lg-3">
            Time on roll: <strong>{{$timeOnRoll}}</strong>
        </div>
    </div>
</section>
<hr>

<section id="attainment" class="mb-3">
    <div>
        <h1 class="text-primary py-3"><i class="far fa-star fa-fw fa-lg text-cyan"></i>&nbsp;&nbsp;Attainment</h1>
    </div>
    <h6>EYFS</h6>
    <div class="row text-center mb-3">
        <div class="col-12 col-md-2 mb-2">
            <div class="btn btn-primary btn-block btn-sm">
                GLD - Yes
            </div>
        </div>
        <div class="col-12 col-md-2 mb-2">
            <div class="btn btn-primary btn-block btn-sm">
                Y1 Phonics - Yes
            </div>
        </div>
        <div class="col-12 col-md-2 mb-2">
            <div class="btn btn-light btn-block btn-sm">
                Y2 Phonics - N/A
            </div>
        </div>
    </div>
    <h6>Key Stage 1</h6>
    <div class="row text-center mb-3">
        <div class="col-12 col-md-2 mb-2">
            <div class="btn btn-primary btn-block btn-sm">
                KS1 Reading - EXS
            </div>
        </div>
        <div class="col-12 col-md-2 mb-2">
            <div class="btn btn-warning btn-block btn-sm">
                KS1 Maths - WTS
            </div>
        </div>
        <div class="col-12 col-md-2 mb-2">
            <div class="btn btn-primary btn-block btn-sm">
                KS1 Writing - EXS
            </div>
        </div>
    </div>
    <h6>Key Stage 2</h6>
    <div class="row text-center mb-3">
        <div class="col-12 col-md-2 mb-2">
            <div class="btn btn-primary btn-block btn-sm">
                KS2 Reading
            </div>
        </div>
        <div class="col-12 col-md-2 mb-2">
            <div class="btn btn-primary btn-block btn-sm">
                KS2 Maths
            </div>
        </div>
        <div class="col-12 col-md-2 mb-2">
            <div class="btn btn-primary btn-block btn-sm">
                KS2 Writing
            </div>
        </div>
    </div>

</section>
<hr>

@if (!empty($attendance[0]))
<section id="attendance">
    <div class="w-100">
        <h1 class="text-primary py-3"><i class="far fa-calendar-alt fa-fw fa-lg"></i>&nbsp;&nbsp;Attendance</h1>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 order-lg-2 pb-3">
            <canvas id="myChart" ></canvas>
        </div>
        <div class="col-12 col-lg-6 order-lg-1 pb-3">
            <table class="table text-center">
                <thead>
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
                        <td class="bg-red text-white">Unauthorised</td>
                        <td class="">{{$attendance[0]->uabs}}</td>
                        <td class="">{{ round(($attendance[0]->uabs / $attendance[0]->possible) * 100,1)}}% </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
<hr>
@endif
</div>

<script>

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
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
