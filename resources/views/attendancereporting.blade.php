{{-- @extends('layouts.app') --}}
{{-- @section('content') --}}
<div class="container marketing">

    <hr class="featurette-divider d-none">

    {{-- <div class="row featurette content"> --}}
        {{-- <div class="col-12"> --}}
        <h1 id="attendancereports" class="display-3 content">Attendance Reports</h1>
        {{-- </div> --}}
    {{-- </div> --}}
    {{-- <hr class="featurette-divider"> --}}
    <p class="lead">Attendance and Conduct Reports</p>
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fMontgomery%2fAttendanceConductSummaryGroups19&rs:Command=Render" onclick="return !window.open(this.href, 'Key Groups by Week', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Key Groups 19-20 &raquo;</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceConductSummaryStudents19&rs:Command=Render" onclick="return !window.open(this.href, 'Key Group Students by Week', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Key Group Students 19-20 &raquo;</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs?%2fMontgomery%2fStudentAttendanceWeekly19&rs:Command=Render" onclick="return !window.open(this.href, 'Students Running Total Attendance', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Student Running Total 19-20 &raquo;</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fMontgomery%2fAttendanceConductSummaryGroups&rs:Command=Render" onclick="return !window.open(this.href, 'Key Groups by Week', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Key Groups 18-19 &raquo;</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceConductSummaryStudents&rs:Command=Render" onclick="return !window.open(this.href, 'Key Group Students by Week', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Key Group Students 18-19 &raquo;</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fStudentAttendanceWeekly&rs:Command=Render" onclick="return !window.open(this.href, 'Students Running Total Attendance', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Student Running Total 18-19 &raquo;</a></p>
        </div>
    </div>
    <hr class="featurette-divider">
    <p class="lead">Persistent Absence (At Risk) Reports</p>
    <div class="row">
    <div class="col-md-3">
        <p><a class="btn btn-warning btn-block" href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fMontgomery%2fPA%20Groups%2019&rs:Command=Render" onclick="return !window.open(this.href, 'Persistent Absence Key Groups', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Key Groups 19/20&raquo;</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-warning btn-block" href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fMontgomery%2fPA+Students&rs:Command=Render" onclick="return !window.open(this.href, 'Persistent Absence: Students At Risk ', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Students 18/19&raquo;</a></p>
        </div>
    </div>
    <div class="row">
    <div class="col-md-3">
        <p><a class="btn btn-info btn-block" href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fMontgomery%2fPA%20Groups%2018&rs:Command=Render" onclick="return !window.open(this.href, 'Persistent Absence Key Groups', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Key Groups 18/19&raquo;</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-warning btn-block disabled" href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fMontgomery%2fPA+Students&rs:Command=Render" onclick="return !window.open(this.href, 'Persistent Absence Key Groups', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Students 17/18&raquo;</a></p>
        </div>
    </div>
    <hr class="featurette-divider">
    <p class="lead">Late to Lesson Reports</p>
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs?%2fMontgomery%2fL2L_CL_Students&rs:Command=Render&rc:Section=1" onclick="return !window.open(this.href, 'L2L_CL_Students', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Students L2L &raquo;</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-info btn-block" href="http://fcatdata/rs?%2fMontgomery%2fL2L_CL_Staff&rs:Command=Render&rc:Section=1" onclick="return !window.open(this.href, 'L2L_CL_Staff', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Staff L2L &raquo;</a></p>
        </div>
    </div>
    <hr class="featurette-divider">
    <p class="lead">Weekly Reports - analysis by week 2019-2020</p>
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceWeekly19&rs:Command=Render&rc:Section=2" onclick="return !window.open(this.href, 'Top Net Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span>&nbsp;&nbsp;Pupil Premium by Week &raquo;</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceWeekly19&rs:Command=Render&rc:Section=9" onclick="return !window.open(this.href, 'Top Acheivement Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;&nbsp;House by Week &raquo;</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceWeekly19&rs:Command=Render&rc:Section=3" onclick="return !window.open(this.href, 'Top Acheivement Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;&nbsp;Boy/Girl by Week &raquo;</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceWeekly19&rs:Command=Render" onclick="return !window.open(this.href, 'Student Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;All Years &raquo;</a></p>
        </div>
        <div class="col-md-2">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceWeekly19&rs:Command=Render&rc:Section=4" onclick="return !window.open(this.href, 'Student Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Year 7 &raquo;</a></p>
        </div>
        <div class="col-md-2">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceWeekly19&rs:Command=Render&rc:Section=5" onclick="return !window.open(this.href, 'Top Net Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Year 8 &raquo;</a></p>
        </div>
        <div class="col-md-2">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceWeekly19&rs:Command=Render&rc:Section=6" onclick="return !window.open(this.href, 'Top Acheivement Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Year 9 &raquo;</a></p>
        </div>
        <div class="col-md-2">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceWeekly19&rs:Command=Render&rc:Section=7" onclick="return !window.open(this.href, 'Top Behaviour Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Year 10 &raquo;</a></p>
        </div>
        <div class="col-md-2">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceWeekly19&rs:Command=Render&rc:Section=8" onclick="return !window.open(this.href, 'Top Behaviour Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Year 11 &raquo;</a></p>
        </div>
    </div>

    <hr class="featurette-divider">
    <p class="lead">Weekly Reports - analysis by week 2018-2019</p>
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceWeekly&rs:Command=Render&rc:Section=2" onclick="return !window.open(this.href, 'Top Net Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span>&nbsp;&nbsp;Pupil Premium by Week &raquo;</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceWeekly&rs:Command=Render&rc:Section=9" onclick="return !window.open(this.href, 'Top Acheivement Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;&nbsp;House by Week &raquo;</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceWeekly&rs:Command=Render&rc:Section=3" onclick="return !window.open(this.href, 'Top Acheivement Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;&nbsp;Boy/Girl by Week &raquo;</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceWeekly&rs:Command=Render" onclick="return !window.open(this.href, 'Student Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;All Years &raquo;</a></p>
        </div>
        <div class="col-md-2">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceWeekly&rs:Command=Render&rc:Section=4" onclick="return !window.open(this.href, 'Student Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Year 7 &raquo;</a></p>
        </div>
        <div class="col-md-2">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceWeekly&rs:Command=Render&rc:Section=5" onclick="return !window.open(this.href, 'Top Net Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Year 8 &raquo;</a></p>
        </div>
        <div class="col-md-2">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceWeekly&rs:Command=Render&rc:Section=6" onclick="return !window.open(this.href, 'Top Acheivement Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Year 9 &raquo;</a></p>
        </div>
        <div class="col-md-2">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceWeekly&rs:Command=Render&rc:Section=7" onclick="return !window.open(this.href, 'Top Behaviour Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Year 10 &raquo;</a></p>
        </div>
        <div class="col-md-2">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceWeekly&rs:Command=Render&rc:Section=8" onclick="return !window.open(this.href, 'Top Behaviour Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Year 11 &raquo;</a></p>
        </div>
    </div>
    <hr class="featurette-divider">
    <p class="lead">Daily Reports - analysis by weekday</p>
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceDaily&rs:Command=Render&rc:Section=2" onclick="return !window.open(this.href, 'Top Net Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span>&nbsp;&nbsp;Pupil Premium by Day &raquo;</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceDaily&rs:Command=Render&rc:Section=9" onclick="return !window.open(this.href, 'Top Acheivement Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;&nbsp;House by Day &raquo;</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceDaily&rs:Command=Render&rc:Section=3" onclick="return !window.open(this.href, 'Top Acheivement Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;&nbsp;Boy/Girl by Day &raquo;</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceDaily&rs:Command=Render" onclick="return !window.open(this.href, 'Student Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;All Years &raquo;</a></p>
        </div>
        <div class="col-md-2">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceDaily&rs:Command=Render&rc:Section=4" onclick="return !window.open(this.href, 'Student Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Year 7 &raquo;</a></p>
        </div>
        <div class="col-md-2">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceDaily&rs:Command=Render&rc:Section=5" onclick="return !window.open(this.href, 'Top Net Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Year 8 &raquo;</a></p>
        </div>
        <div class="col-md-2">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceDaily&rs:Command=Render&rc:Section=6" onclick="return !window.open(this.href, 'Top Acheivement Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Year 9 &raquo;</a></p>
        </div>
        <div class="col-md-2">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceDaily&rs:Command=Render&rc:Section=7" onclick="return !window.open(this.href, 'Top Behaviour Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Year 10 &raquo;</a></p>
        </div>
        <div class="col-md-2">
        <p><a class="btn btn-light btn-block" href="http://fcatdata/rs?%2fMontgomery%2fAttendanceDaily&rs:Command=Render&rc:Section=8" onclick="return !window.open(this.href, 'Top Behaviour Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;&nbsp;Year 11 &raquo;</a></p>
        </div>
    </div>

</div>
{{-- @endsection --}}
