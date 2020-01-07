@extends('layouts.app')
@section('content')
@php

$date1 = new DateTime($student->filterstartdate);
$date2 = new DateTime("2020-01-07");
$timeOnRoll = $date1->diff($date2)->m;


foreach ($attendance as $attendance) {
}

$stable = false;
if ($student->year === '7') {
    $stable = true;
}

@endphp

<div class="container">
<section id="pupildetails" class="mb-5">
    <div class="photo">

    </div>
    <div class="name">
        <h1>{{$student->pforename}} {{$student->psurname}}</h1>
        <h4>{{ucfirst($student->school)}} </h4>
    </div>
</section>
<section id="groups" class="mb-5">
    <div>
        <h4>Groups</h4>
    </div>
    <div class="row">
        @if (!empty($student->year))
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <div class="btn btn-sm btn-block btn-primary">Year {{$student->year}} </div>
            </div>
        @endif
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
        @if (!empty($attendance->PA))
            @if ($attendance->PA = 1)
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
            <p>Time on roll: <strong>{{$timeOnRoll}} months</strong></p>
        </div>
    </div>
</section>

<section id="attendance">
    <div>
        <h4>Attendance</h4>
    </div>
    <div class="row">
        <div class="col-12 col-3">
            <p></p>
        </div>
    </div>
</section>

</div>
@endsection
