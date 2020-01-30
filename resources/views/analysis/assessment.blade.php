@extends('layouts.app')
@section('content')
<div class="container text-center wallpaper">
    {{-- <a href="/"><img class="img-fluid mb-5 d-block mx-auto" style="height: 145px;" src="../FCAT-LOGO.jpg" alt=""></a> --}}
    <div class="font-weight-light mb-3">
        <h1 class="display-2">{{$school}} Reporting</h1>
    </div>
    <div class="links">
        <div class="col-12 mb-3">
            <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fCoreSubjectSummaryByYear&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                Core Subject Summary by Year
            </a>
        </div>
        <div class="col-12 mb-3">
            <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fSubjectSummaryByYear&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                Subject Summary by Year
            </a>
        </div>
        <hr>
        <div class="col-12 mb-3">
            <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fSubjectSummaryBySchool&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                Whole School Overview
            </a>
        </div>
        <div class="col-12 mb-3">
            <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fSchoolSubjectSummaryGender&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                Whole School Overview (Girl/Boy)
            </a>
        </div>
        <div class="col-12 mb-3">
            <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fSchoolSubjectSummaryPP&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                Whole School Overview (PP)
            </a>
        </div>
        <div class="col-12 mb-3">
            <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fSchoolSubjectSummarySEND&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                Whole School Overview (SEND)
            </a>
        </div>
        <div class="col-12 mb-3">
            <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fSchoolSubjectSummaryEAL&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                Whole School Overview (EAL)
            </a>
        </div>
        <hr>
        <div class="col-12 mb-3">
            <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fYearSubjectSummary&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                Subject Overview by Year
            </a>
        </div>
        <div class="col-12 mb-3">
            <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fYearSubjectSummaryGender&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                Subject Overview by Year (Girl/Boy)
            </a>
        </div>
        <div class="col-12 mb-3">
            <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fYearSubjectSummaryPP&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                Subject Overview by Year (PP)
            </a>
        </div>
        <div class="col-12 mb-3">
            <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fYearSubjectSummarySEND&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                Subject Overview by Year (SEND)
            </a>
        </div>
        <div class="col-12 mb-3">
            <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fYearSubjectSummaryEAL&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
                Subject Overview by Year (EAL)
            </a>
        </div>
    </div>
    {{-- @include('attendancereporting') --}}
    {{-- <div class="content pa   ">
        <h1 class="display-3">Attendance</h1>
        <h1 class="text-muted">Groups Summary</h1>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="bg-light text-white">
                    <th>Group</th>
                    <th>Present</th>
                    <th>Possible</th>
                    <th>%<br>Attendance</th>
                </thead>
                <tbody>
                    @foreach ($attgroups as $group)
                    <tr>
                        <td>{{$group->Group}} </td>
                        <td>{{$group->present}} </td>
                        <td>{{$group->possible}} </td>
                        <td>{{round($group->pAttendance,1)}} % </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="content pa   ">
        <h1 class="display-3">Attendance</h1>
        <h1 class="text-muted">Groups Summary: At Risk of PA</h1>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="bg-light text-white">
                    <th>Group</th>
                    <th>Size</th>
                    <th>Count<br>At Risk</th>
                    <th>%<br>At Risk</th>
                </thead>
                <tbody>
                    @foreach ($pagroups as $group)
                    <tr>
                        <td>{{$group->cohort}} </td>
                        <td>{{$group->Size}} </td>
                        <td>{{$group->PA_Count}} </td>
                        <td>{{round($group->pAt_Risk,1)}} % </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="content pa   mt-3 ">
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
@endsection
