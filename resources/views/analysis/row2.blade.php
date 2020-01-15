        {{-- START ROW TWO --}}
        <div class="row">
            <!-- Area Chart -->
            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Cohort Summary</h6>
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
                        <div class="chart-area dash-overflow">
                            <div class="information table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="bg-dark text-white">
                                        <th>Group</th>
                                        <th>Count</th>
                                        <th>%</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($studentCounts19 as $group)
                                        <tr>
                                            <td>{{$group->Group}} </td>
                                            <td>{{$group->Count}} </td>
                                            <td>{{round($group->percent,1) . '%' ?? ''}} </td>
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
            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Year Group Summary</h6>
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
                        <div class="chart-area dash-overflow">
                            <div class="information table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="bg-dark text-white">
                                        <th>Year</th>
                                        <th>Count</th>
                                        <th>% PP</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($studentYearCounts19 as $group)
                                        @if ($group->group != 'School')
                                        <tr>
                                            <td>{{$group->group}} </td>
                                            <td>{{$group->count}} </td>
                                            <td>{{round(($group->pppercent)*100,1) . '%' ?? ''}} </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Non-Routine Adminssions & Leavers</h6>
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
                        <div class="chart-area dash-overflow">
                            <table class="table small mb-0">
                                <thead class="bg-dark text-white">
                                    <th>Year</th>
                                    <th>Non-Routine Adminssions</th>
                                    <th>Mid Year Leavers</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Year {{rand(1,11)}}</td>
                                        <td>{{rand(3,11)}}</td>
                                        <td>{{rand(3,11)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Year {{rand(1,11)}}</td>
                                        <td>{{rand(3,11)}}</td>
                                        <td>{{rand(3,11)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Year {{rand(1,11)}}</td>
                                        <td>{{rand(3,11)}}</td>
                                        <td>{{rand(3,11)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Year {{rand(1,11)}}</td>
                                        <td>{{rand(3,11)}}</td>
                                        <td>{{rand(3,11)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Year {{rand(1,11)}}</td>
                                        <td>{{rand(3,11)}}</td>
                                        <td>{{rand(3,11)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Year {{rand(1,11)}}</td>
                                        <td>{{rand(3,11)}}</td>
                                        <td>{{rand(3,11)}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END ROW TWO --}}
