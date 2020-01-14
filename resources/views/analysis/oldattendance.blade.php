<div class="mb-5">
    <hr>
    <h1 id="attendance" class="display-2">Attendance</h1>
    <h3>Attendance Groups Summary</h3>
    <p>27-08-19 to {{DateTimeHelper::shortDate($enddate) ?? '' }} </p>
    <div class="row mb-5">
        <div class="col-12 col-lg-6">
            <canvas id="groupAttChart" ></canvas>
        </div>
        <div class="col-12 col-lg-6">
            <div class="information table-responsive">
                <table class="table table-hover">
                    <thead class="">
                        <th>Group</th>
                        <th>Attendance</th>
                    </thead>
                    <tbody>
                        @foreach ($attgroups as $group)
                        <tr>
                            <td>{{$group->Group}} </td>
                            <td>{{round($group->pAttendance,1)}} % </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
