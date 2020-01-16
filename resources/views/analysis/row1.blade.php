        {{-- START ROW ONE --}}
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-black">Attendance Overview</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(17px, 19px, 0px);">
                                <div class="dropdown-header">Weekly Cummulative Reports:</div>
                                <a class="dropdown-item" href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fAttendanceWeekly19&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Key Group Students by Week', 'width=1024,height=768')"><i class="fas fa-angle-double-right fa-fw"></i>&nbsp;&nbsp;Weekly Attendance by Year</a>
                                <a class="dropdown-item" href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fAttendanceWeekly19&school={{$school}}&rs:Command=Render&rc:Section=2" onclick="return !window.open(this.href, 'Key Group Students by Week', 'width=1024,height=768')"><i class="fas fa-angle-double-right fa-fw"></i>&nbsp;&nbsp;Weekly Attendance by PP</a>
                                <a class="dropdown-item" href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fAttendanceWeekly19&school={{$school}}&rs:Command=Render&rc:Section=3" onclick="return !window.open(this.href, 'Key Group Students by Week', 'width=1024,height=768')"><i class="fas fa-angle-double-right fa-fw"></i>&nbsp;&nbsp;Weekly Attendance by Gender</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fAttendanceStudentWeekly19&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Key Group Students by Week', 'width=1024,height=768')"><i class="fas fa-angle-double-right fa-fw"></i>&nbsp;&nbsp;Weekly Attendance by Student</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area dash-overflow">
                            <canvas id="schoolWeeklyAttendanceChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-black">Attendance Summary</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(17px, 19px, 0px);">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="groupAttChart"></canvas>
                        </div>
                    </div>
                    <div class="mt-4 text-center small d-none">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Present
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> Absence
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Unauthorised
                        </span>
                    </div>
                </div>
            </div>
        </div>
        {{-- END ROW ONE --}}
        @include('analysis.attendancePieChart')
        @include('analysis.schoolWeeklyAttendanceChart')
