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
