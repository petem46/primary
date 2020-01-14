<div class="my-5">
    <h1 id="context" class="display-2">Context</h1>
    <div class="row">
        <div class="col-12 col-lg-6">
            <h3>Pupils On Roll</h3>
            <div class="information table-responsive">
                <table class="table table-hover">
                    <thead class="">
                        <th>Group</th>
                        <th>Count</th>
                        <th>%</th>
                    </thead>
                    <tbody>
                        @foreach ($studentCounts19 as $group)
                        <tr>
                            <td>{{$group->Group}} </td>
                            <td>{{$group->Count}} </td>
                            <td>{{round($group->percent,1) ?? ''}}% </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <h3>Year Groups</h3>
            <div class="information table-responsive">
                <table class="table table-hover">
                    <thead class="">
                        <th>Year</th>
                        <th>Count</th>
                        <th>% PP</th>
                        <th>APS</th>
                    </thead>
                    <tbody>
                        @foreach ($studentYearCounts19 as $group)
                        <tr>
                            <td>{{$group->group}} </td>
                            <td>{{$group->count}} </td>
                            <td>{{round(($group->pppercent)*100,1) ?? ''}}% </td>
                            <td>28.5</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
