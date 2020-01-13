@extends('layouts.app')
@section('content')
<div class="container marketing">


    <h1 class="display-3 content featurette-heading">Conduct Reports</h1>
    <hr class="featurette-divider">
    <p class="lead">Reward and Behaviour Points 2019/2020</p>
    <hr class="featurette-divider">
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fWeekly+N+Points+by+Student19&rs:Command=Render" onclick="return !window.open(this.href, 'Top Net Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>&nbsp;&nbsp;Weekly Net Points by Students</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fWeekly+A+Points+by+Student19&rs:Command=Render" onclick="return !window.open(this.href, 'Top Reward Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;&nbsp;Weekly Reward by Student</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-warning btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fWeekly+B+Points+by+Student19&rs:Command=Render" onclick="return !window.open(this.href, 'Worst Behaviour Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>&nbsp;&nbsp;Weekly Behaviour by Student</a></p>
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fWeekly+N+Points+by+Reg19&rs:Command=Render" onclick="return !window.open(this.href, 'Top Net Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>&nbsp;&nbsp;Weekly Net Points by Reg</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fWeekly+A+Points+by+Reg19&rs:Command=Render" onclick="return !window.open(this.href, 'Top Reward Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;&nbsp;Weekly Reward by Reg</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-warning btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fWeekly+B+Points+by+Reg19&rs:Command=Render" onclick="return !window.open(this.href, 'Worst Behaviour Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>&nbsp;&nbsp;Weekly Behaviour by Reg</a></p>
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fWeekly%20N%20Points%20by%20House19&rs:Command=Render" onclick="return !window.open(this.href, 'Top Net Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>&nbsp;&nbsp;Weekly Net Points by House</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop%20A%20Points%20by%20House19&rs:Command=Render" onclick="return !window.open(this.href, 'Top Reward Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;&nbsp;Weekly Reward by House</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-warning btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop%20B%20Points%20by%20House19&rs:Command=Render" onclick="return !window.open(this.href, 'Worst Behaviour Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>&nbsp;&nbsp;Weekly Behaviour by House</a></p>
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop%20Net%20Points%20by%20House19&rs:Command=Render" onclick="return !window.open(this.href, 'Top Net Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>&nbsp;&nbsp;Top Net Points by House</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop%20A%20Points%20by%20House19&rs:Command=Render" onclick="return !window.open(this.href, 'Top Reward Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;&nbsp;Top Reward by House</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-warning btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop%20B%20Points%20by%20House19&rs:Command=Render" onclick="return !window.open(this.href, 'Worst Behaviour Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>&nbsp;&nbsp;Worst Behaviour by House</a></p>
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop+Ten+Net+Points+by+Reg19&rs:Command=Render" onclick="return !window.open(this.href, 'Top Net Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>&nbsp;&nbsp;Top Net Points by Reg</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop+Ten+Reward+Points+by+Reg19&rs:Command=Render" onclick="return !window.open(this.href, 'Top Reward Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;&nbsp;Top Reward by Reg</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-warning btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop+Ten+Behaviour+Points+by+Reg19&rs:Command=Render" onclick="return !window.open(this.href, 'Worst Behaviour Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>&nbsp;&nbsp;Worst Behaviour by Reg</a></p>
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop+Ten+Net+Points+by+Year19&rs:Command=Render" onclick="return !window.open(this.href, 'Top Net Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>&nbsp;&nbsp;Top Net by Year</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop+Ten+Reward+Points+by+Year19&rs:Command=Render" onclick="return !window.open(this.href, 'Top Reward Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;&nbsp;Top Reward by Year</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-warning btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop+Ten+Behaviour+Points+by+Year19&rs:Command=Render" onclick="return !window.open(this.href, 'Worst Behaviour Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>&nbsp;&nbsp;Worst Behaviour by Year</a></p>
        </div>
    </div>


    <!-- /END THE FEATURETTES -->
    <hr class="featurette-divider">
    <p class="lead">Reward and Behaviour Points 2018/2019</p>
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-yellow btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fStudent+Conduct+Points&rs:Command=Render" onclick="return !window.open(this.href, 'Student Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>&nbsp;&nbsp;All Points 2018/19</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-warning btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fStudent+C+Report&rs:Command=Render" onclick="return !window.open(this.href, 'Student C1 - 5 Report', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>&nbsp;&nbsp;C1 - 5 Student Summary</a></p>
        </div>
        <div class="col-md-3 hidden">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fWeekly+A+Points+by+Student&rs:Command=Render" onclick="return !window.open(this.href, 'Top Reward Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;&nbsp;Weekly Reward Points</a></p>
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fWeekly+N+Points+by+Student&rs:Command=Render" onclick="return !window.open(this.href, 'Top Net Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>&nbsp;&nbsp;Weekly Net Points by Students</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fWeekly+A+Points+by+Student&rs:Command=Render" onclick="return !window.open(this.href, 'Top Reward Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;&nbsp;Weekly Reward by Student</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-warning btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fWeekly+B+Points+by+Student&rs:Command=Render" onclick="return !window.open(this.href, 'Worst Behaviour Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>&nbsp;&nbsp;Weekly Behaviour by Student</a></p>
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fWeekly+N+Points+by+Reg&rs:Command=Render" onclick="return !window.open(this.href, 'Top Net Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>&nbsp;&nbsp;Weekly Net Points by Reg</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fWeekly+A+Points+by+Reg&rs:Command=Render" onclick="return !window.open(this.href, 'Top Reward Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;&nbsp;Weekly Reward by Reg</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-warning btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fWeekly+B+Points+by+Reg&rs:Command=Render" onclick="return !window.open(this.href, 'Worst Behaviour Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>&nbsp;&nbsp;Weekly Behaviour by Reg</a></p>
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop%20Net%20Points%20by%20House&rs:Command=Render" onclick="return !window.open(this.href, 'Top Net Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>&nbsp;&nbsp;Top Net Points by House</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop%20A%20Points%20by%20House&rs:Command=Render" onclick="return !window.open(this.href, 'Top Reward Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;&nbsp;Top Reward by House</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-warning btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop%20B%20Points%20by%20House&rs:Command=Render" onclick="return !window.open(this.href, 'Worst Behaviour Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>&nbsp;&nbsp;Worst Behaviour by House</a></p>
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop+Ten+Net+Points+by+Reg&rs:Command=Render" onclick="return !window.open(this.href, 'Top Net Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>&nbsp;&nbsp;Top Net Points by Reg</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop+Ten+Reward+Points+by+Reg&rs:Command=Render" onclick="return !window.open(this.href, 'Top Reward Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;&nbsp;Top Reward by Reg</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-warning btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop+Ten+Behaviour+Points+by+Reg&rs:Command=Render" onclick="return !window.open(this.href, 'Worst Behaviour Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>&nbsp;&nbsp;Worst Behaviour by Reg</a></p>
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop+Ten+Net+Points+by+Year&rs:Command=Render" onclick="return !window.open(this.href, 'Top Net Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>&nbsp;&nbsp;Top Net by Year</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop+Ten+Reward+Points+by+Year&rs:Command=Render" onclick="return !window.open(this.href, 'Top Reward Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;&nbsp;Top Reward by Year</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-warning btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fTop+Ten+Behaviour+Points+by+Year&rs:Command=Render" onclick="return !window.open(this.href, 'Worst Behaviour Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>&nbsp;&nbsp;Worst Behaviour by Year</a></p>
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fMontgomery%2fYear+Group+Points&rs:Command=Render" onclick="return !window.open(this.href, 'Year Group Points', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>&nbsp;&nbsp;Year Group Points</a></p>
        </div>
        <div class="col-md-3 col-md-offset-3">
        <p><a class="btn btn-warning btn-block" href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fMontgomery%2fWeekly+Behaviour+Points&rs:Command=Render" onclick="return !window.open(this.href, 'Weekly Behaviour Point Summary', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;&nbsp;Weekly Behaviour Summary</a></p>
        </div>
    </div>

    <hr class="featurette-divider">
    <p class="lead">C1 - C5 Subject Reports</p>
    <div class="row">
        <div class="col-md-3">
        <p><a class="btn btn-primary btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fSubject%20Year%20C1-5&rs:Command=Render" onclick="return !window.open(this.href, 'C1 - C5 Subject Year', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-indent-left" aria-hidden="true"></span>&nbsp;&nbsp;Subject &raquo; Year</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-success btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fSubject%20Staff%20C1-5&rs:Command=Render" onclick="return !window.open(this.href, 'C1 - C5 Subject Staff', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;Subject  &raquo; Staff</a></p>
        </div>
        <div class="col-md-3">
        <p><a class="btn btn-warning btn-block" href="http://fcatdata/rs/?%2fMontgomery%2fStaff%20C1-5&rs:Command=Render" onclick="return !window.open(this.href, 'C1 - C5 Staff', 'width=1024,height=768')"
        target="_blank" role="button"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;Staff  &raquo; Year</a></p>
        </div>
    </div>
</div>
@endsection
