@extends('layouts.app')
@section('content')
<div class="content containter">
    <a href="/"><img class="img-fluid mb-5 d-block mx-auto" style="height: 145px;" src="../FCAT-LOGO.jpg" alt=""></a>
    <div class="title m-b-md">
        {{$school}} Reporting
    </div>
    <div class="links">
        <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fCoreSubjectSummaryByYear&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
            Core Subject Summary by Year
        </a><p style="margin-bottom: 5px;"></p>
        <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fSubjectSummaryByYear&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
            Subject Summary by Year
        </a><p style="margin-bottom: 5px;"></p>
        <hr>
        <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fSubjectSummaryBySchool&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
            Whole School Overview
        </a><p style="margin-bottom: 5px;"></p>
        <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fSchoolSubjectSummaryGender&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
            Whole School Overview (Girl/Boy)
        </a><p style="margin-bottom: 5px;"></p>
        <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fSchoolSubjectSummaryPP&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
            Whole School Overview (PP)
        </a><p style="margin-bottom: 5px;"></p>
        <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fSchoolSubjectSummarySEND&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
            Whole School Overview (SEND)
        </a><p style="margin-bottom: 5px;"></p>
        <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fSchoolSubjectSummaryEAL&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
            Whole School Overview (EAL)
        </a><p style="margin-bottom: 5px;"></p>
        <hr>
        <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fYearSubjectSummary&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
            Subject Overview by Year
        </a><p style="margin-bottom: 5px;"></p>
        <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fYearSubjectSummaryGender&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
            Subject Overview by Year (Girl/Boy)
        </a><p style="margin-bottom: 5px;"></p>
        <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fYearSubjectSummaryPP&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
            Subject Overview by Year (PP)
        </a><p style="margin-bottom: 5px;"></p>
        <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fYearSubjectSummarySEND&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
            Subject Overview by Year (SEND)
        </a><p style="margin-bottom: 5px;"></p>
        <a href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Primary+SSRS%2fYearSubjectSummaryEAL&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')">
            Subject Overview by Year (EAL)
        </a>
    </div>
    {{-- @include('attendancereporting') --}}
    <div class="content pa d-none  ">
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
    <div class="content pa d-none  ">
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
    <div class="content pa d-none  mt-3 ">
        <h1 class="display-3">Attendance</h1>
        <h1 class="text-muted">Students: At Risk of PA</h1>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="bg-light text-white">
                    <th>Name</th>
                    <th>Reg</th>
                    <th>Attendance</th>
                </thead>
                <tbody>
                    @foreach ($pastudents as $student)
                    @if ($student->PA == 1)
                    <tr>
                        <td>{{$student->forename}} {{$student->surname}} </td>
                        <td>{{$student->reg}} </td>
                        <td>{{ round($student->percentage,1) }} % </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- @include('conductreporting') --}}

</div>
@endsection
