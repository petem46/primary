        {{-- START ROW TWO --}}
        <div class="row">
            <!-- Pie Chart -->
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-black">Venn of Vulnerability</h6>
                        <div class="dropdown no-arrow d-none">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(17px, 19px, 0px);">
                                <div class="dropdown-header">Downloadable Report:</div>
                                <a class="dropdown-item" href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fPA+Groups+19&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Key Group Students by Week', 'width=1024,height=768')"><i class="fas fa-angle-double-right fa-fw"></i>Download PA Report</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body row">
                        <div id="venn" class="col-8">
                            @include('analysis/VoVvenn')
                        </div>
                        <div class="col-4 text-left">
                            <p></p>
                            <p><i style="color: rgb(0,128,128,0.8);" class="fas fa-circle fa-fw "></i>&nbsp;&nbsp;1+ FTE</p>
                            <p><i style="color: rgb(255,163,51,0.8);" class="fas fa-circle fa-fw "></i>&nbsp;&nbsp;SEND</p>
                            <p><i style="color: rgb(220,20,60,0.8);" class="fas fa-circle fa-fw "></i>&nbsp;&nbsp;At Risk PA</p>
                            <p><i style="color: steelblue;" class="fas fa-circle fa-fw "></i>&nbsp;&nbsp;1+ FTE & SEND</p>
                            <p><i style="color: rgb(75,0,130, 0.6);" class="fas fa-circle fa-fw "></i>&nbsp;&nbsp;1+ FTE & PA</p>
                            <p><i style="color: darkorange;" class="fas fa-circle fa-fw "></i>&nbsp;&nbsp;SEND & PA</p>
                            <p><i style="color: rgb(255, 0, 0, 0.8);" class="fas fa-circle fa-fw "></i>&nbsp;&nbsp;1+ FTE & SEND & PA</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-lg-6 ">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-black">Exclusion Data</h6>
                        <div class="dropdown no-arrow d-none">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(17px, 19px, 0px);">
                                <div class="dropdown-header">Downloadable Report:</div>
                                <a class="dropdown-item" href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fPA+Groups+19&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Key Group Students by Week', 'width=1024,height=768')"><i class="fas fa-angle-double-right fa-fw"></i>Download PA Report</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pb-2">
                            Fixed Term and Permanent Exclusion Data Here
                            {{-- <canvas id="paBarChart" ></canvas> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @include('analysis.paBarChart') --}}

        {{-- END ROW TWO --}}
