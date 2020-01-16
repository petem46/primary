{{-- @extends('layouts.dash') --}}
@extends('layouts.app')
@section('content')
{{-- <a href="/"><img class="img-fluid mb-5 d-block mx-auto" style="height: 145px;" src="../FCAT-LOGO.jpg" alt=""></a> --}}
<div class="container1 text-center wallpaper mx-5 schooldashboard">
    <div class="my-5">
        <h1 class="display-2 mb-3">{{ucfirst($school)}} Dashboard</h1>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-left-teal shadow h-100 py-2">
                    <div class="px-3">
                        <div class="row">
                            <div class="col-sm-5 my-auto">
                                <span class="float-left text-teal"><i class="fas fa-users fa-fw fa-3x"></i></span>
                            </div>
                            <div class="col-sm-7 my-auto text-right">
                                <small class="text-muted">pupils</small>
                                <br>
                                <h2 class="">{{$studentCounts19[0]->Count}}</h2>
                            </div>
                            <div class="col-12">
                                <hr class="m-1">
                                <small class="text-teal float-right">Number On Roll</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-left-teal shadow h-100 py-2">
                    <div class="px-3">
                        <div class="row">
                            <div class="col-sm-5 my-auto">
                                <span class="float-left text-blue"><i class="fas fa-user-plus fa-fw fa-3x"></i></span>
                            </div>
                            <div class="col-sm-7 my-auto text-right">
                                <small class="text-muted">% pupils</small>
                                <br>
                                <h2 class="">{{round($studentCounts19[1]->percent,1) ?? ''}}</h2>
                            </div>
                            <div class="col-12">
                                <hr class="m-1">
                                <small class="text-blue float-right">Pupil Premium Status</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-left-teal shadow h-100 py-2">
                    <div class="px-3">
                        <div class="row">
                            <div class="col-sm-5 my-auto">
                                <span class="float-left text-warning"><i class="far fa-calendar-alt fa-fw fa-3x"></i></span>
                            </div>
                            <div class="col-sm-7 my-auto text-right">
                                <small class="text-muted">% present</small>
                                <br>
                                <h2 class="">{{round($attgroups[0]->pAttendance,1) ?? ''}}</h2>
                            </div>
                            <div class="col-12">
                                <hr class="m-1">
                                <small class="text-warning float-right">Whole School Attendance</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-left-teal shadow h-100 py-2">
                    <div class="px-3">
                        <div class="row">
                            <div class="col-sm-5 my-auto">
                                <span class="float-left text-danger"><i class="fas fa-exclamation-triangle fa-fw fa-3x"></i></span>
                            </div>
                            <div class="col-sm-7 my-auto text-right">
                                <small class="text-muted">% pupils</small>
                                <br>
                                <h2 class="">{{round($pagroups[0]->pAt_Risk,1) ?? ''}}</h2>
                            </div>
                            <div class="col-12">
                                <hr class="m-1">
                                <small class="text-danger float-right">At risk of Persistent Absence</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('analysis/row2')
        @include('analysis/row1')
        @include('analysis/row3')

    </div>

    <div class="container1 text-center wallpaper mx-5">

        {{-- @include('analysis/oldcontext') --}}
        {{-- @include('analysis/oldattendance') --}}
        {{-- @include('analysis/oldpa') --}}

    </div>

@endsection
