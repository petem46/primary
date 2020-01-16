        {{-- START ROW TWO --}}
        <div class="row">
            <!-- Pie Chart -->
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-black">% At Risk of Persistent Absence</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(17px, 19px, 0px);">
                                <div class="dropdown-header">Downloadable Report:</div>
                                <a class="dropdown-item" href="http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fPA+Groups+19&school={{$school}}&rs:Command=Render" onclick="return !window.open(this.href, 'Key Group Students by Week', 'width=1024,height=768')"><i class="fas fa-angle-double-right fa-fw"></i>Download PA Report</a>
                                {{-- <a class="dropdown-item" href="#">Another action</a> --}}
                                {{-- <div class="dropdown-divider"></div> --}}
                                {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area dash-overflow">
                            <div class="information table-responsive">
                                <table class="table table-hover">
                                    <thead class="bg-dark text-white">
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
                                            <td>{{round($group->pAt_Risk,1) . '%' ?? '' }} </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-black">% At Risk of Persistent Absence</h6>
                        <div class="dropdown no-arrow d-none">
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
                        <div class="chart-pie pb-2">
                            <canvas id="paBarChart" ></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('analysis.paBarChart')

        {{-- END ROW TWO --}}
