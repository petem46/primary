@extends('layouts.app')
@section('content')
{{-- <a href="/"><img class="img-fluid mb-5 d-block mx-auto" style="height: 145px;" src="../FCAT-LOGO.jpg" alt=""></a> --}}
<div class="school-title font-weight-light">
    <div class="container text-center wallpaper">
        {{$school}} Academy
    </div>
    <div class="row mx-5">
        <div class="col-6 col-md-3 mb-2 mb-md-0">
            <a href="#context" class="text-white btn btn-block p-2 btn-teal"><i class="fas fa-users fa-fw fa-lg"></i>&nbsp;&nbsp;NoR: {{$studentCounts19[0]->Count}} </a>
        </div>
        <div class="col-6 col-md-3 mb-2 mb-md-0">
            <a href="#context" class="text-white btn btn-block p-2 btn-indigo"><i class="fas fa-male fa-fw fa-lg"></i>&nbsp;&nbsp;PP: {{round($studentCounts19[1]->percent,1) ?? ''}}% </a>
        </div>
        <div class="col-6 col-md-3 mb-2 mb-md-0">
            <a href="#attendance" class="text-white btn btn-block p-2 btn-blue"><i class="far fa-calendar-alt fa-fw fa-lg"></i>&nbsp;&nbsp;Att: {{round($attgroups[0]->pAttendance,1)}}% </a>
        </div>
        <div class="col-6 col-md-3 mb-2 mb-md-0">
            <a href="#parisk" class="text-white btn btn-block p-2 btn-danger"><i class="fas fa-exclamation-triangle fa-fw fa-lg"></i>&nbsp;&nbsp;PA: {{round($pagroups[0]->pAt_Risk,1)}}%  </a>
        </div>
    </div>
</div>

{{-- @include('assessmentreporting') --}}
{{-- @include('attendancereporting') --}}

<div class="container1 text-center wallpaper mx-5">
    <div class="my-5">
        <h1 id="context" class="display-2">Context</h1>
        <div class="row">
            <div class="col-12 col-lg-6">
                <h3>Pupils On Roll</h3>
                <div class="information table-responsive">
                    <table class="table table-hover">
                        <thead class="">
                            <th>Group</th>
                            <th>Count</th>
                            <th>%</th>
                        </thead>
                        <tbody>
                            @foreach ($studentCounts19 as $group)
                            <tr>
                                <td>{{$group->Group}} </td>
                                <td>{{$group->Count}} </td>
                                <td>{{round($group->percent,1) ?? ''}}% </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <h3>Year Groups</h3>
                <div class="information table-responsive">
                    <table class="table table-hover">
                        <thead class="">
                            <th>Year</th>
                            <th>Count</th>
                            <th>% PP</th>
                            <th>APS</th>
                        </thead>
                        <tbody>
                            @foreach ($studentYearCounts19 as $group)
                            <tr>
                                <td>{{$group->group}} </td>
                                <td>{{$group->count}} </td>
                                <td>{{round(($group->pppercent)*100,1) ?? ''}}% </td>
                                <td>28.5</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-5">
        <hr>
        <h1 id="attendance" class="display-2">Attendance</h1>
        <h3>Attendance Groups Summary</h3>
        <p>27-08-19 to {{DateTimeHelper::shortDate($enddate) ?? '' }} </p>
        <div class="row mb-5">
            <div class="col-12 col-lg-6">
                <canvas id="groupAttChart" ></canvas>
            </div>
            <div class="col-12 col-lg-6">
                <div class="information table-responsive">
                    <table class="table table-hover">
                        <thead class="">
                            <th>Group</th>
                            <th>Attendance</th>
                        </thead>
                        <tbody>
                            @foreach ($attgroups as $group)
                            <tr>
                                <td>{{$group->Group}} </td>
                                <td>{{round($group->pAttendance,1)}} % </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-5">
        <hr>
        <h1 id="parisk" class="display-2">Persistent Absence</h1>
        <h3 id="">% Pupils At Risk of PA by Group</h3>
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="information table-responsive">
                    <table class="table table-hover">
                        <thead class="">
                            <th>Group</th>
                            {{-- <th>Size</th> --}}
                            <th>Count<br>At Risk</th>
                            <th>%<br>At Risk</th>
                        </thead>
                        <tbody>
                            @foreach ($pagroups as $group)
                            <tr>
                                <td>{{$group->cohort}} </td>
                                {{-- <td>{{$group->Size}} </td> --}}
                                <td>{{$group->PA_Count}} </td>
                                <td>{{round($group->pAt_Risk,1)}} % </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div id="chartControl" style="position: relative; height: 100%">
                    <canvas id="paBarChart" ></canvas>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="content pa   mt-3 ">
        <h1 class="display-3">Attendance</h1>
        <h1 class="text-muted">Students: At Risk of PA</h1>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="bg-light text-white">
                    <th>Name</th>
                    <th>Reg</th>
                    <th>Attendance</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($pastudents as $student)
                    @if ($student->PA == 1)
                    <tr>
                        <td>{{$student->forename}} {{$student->surname}} </td>
                        <td>{{$student->reg}} </td>
                        <td>{{ round($student->percentage,1) }} % </td>
                        <td><a href='{{action('StudentsController@show', $student->id)}}' class='btn btn-primary'>View Pupil </a></td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}

    {{-- @include('conductreporting') --}}

</div>

<script>

    var ctx = document.getElementById('groupAttChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Present', 'AEA', 'Absence', 'Unauthorised Abs'],
            datasets: [{
                // label: 'Sessions',
                data: [
                    {{$attgroups[0]->pAttendance ?? ''}},
                    100 - {{$attgroups[0]->pAttendance ?? ''}},
                ],
                backgroundColor: [
                    '#00615A',
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
            title: {
                display: true,
                text: '% Whole School Attendance'
            },
            tooltips: {
                enabled: false,
            },
            responsive: true,
            responsiveAnimationDuration: 500,
        }
    });

</script>
<script>

    var ctx = document.getElementById('paBarChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: [
                @foreach ($pagroups as $group)
                    '{{$group->cohort}}',
                @endforeach
            ],
            datasets: [{
                // label: 'Sessions',
                data: [
                    @foreach ($pagroups as $group)
                        {{round($group->pAt_Risk,1)}},
                    @endforeach
                ],
                backgroundColor: [
                    '#00615A',
                    @foreach ($pagroups as $group)
                    // 'steelblue',
                    @endforeach
                ],
                borderColor: [
                    @foreach ($pagroups as $group)
                    'black',
                    @endforeach
                ],
                borderWidth: 0.5
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
                    // formatter: (value, ctx) => {
                    //     let sum = ctx.dataset._meta[0].total;
                    //     let percentage = (value * 100 / sum).toFixed(1) + "%";
                    //     if (value/sum < 0.1) {
                    //         let percentage = '';
                    //         return percentage;
                    //     }
                    //     if (value/sum >= 0.1) {
                    //         return percentage;
                    //     }
                    // },
                    color: [
                        'white',
                        // 'white',
                        // 'white',
                        // 'white',
                    ],
                    font: {
                        // size: [
                        //     '16'
                        // ],
                    }
                },
            },
            maintainAspectRatio: false,
            responsive: true,
            responsiveAnimationDuration: 500,
            scales: {
                xAxes: [{
                    display: false,
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        beginAtZero: true,
                        suggestedMax: 50,
                    }
                }],
                yAxes: [{
                }],
            },
            title: {
                display: true,
                text: '% Pupils At Risk of PA by Group'
            },
            tooltips: {
                enabled: false,
            },
            annotation: {
                annotations: [{
                    drawTime: "afterDatasetsDraw",
                    // id: "hline",
                    type: "line",
                    mode: "vertical",
                    scaleID: "x-axis-0",
                    value: 15,
                    borderColor: "red",
                    borderWidth: 2,
                    borderDash: [10,10],
                    label: {
                        backgroundColor: "white",
                        content: "Nat",
                        enabled: false,
                    },
                }],
            },
        }
    });

</script>


@endsection
