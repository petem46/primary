@extends('layouts.app')
@section('content')
<div class="container">
    <table id="studentTable" class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Year</th>
                <th>School</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
</div><!-- end containing of content -->

<script>
var data = [
    @foreach ($students as $student)
        [
            "{{$student->pforename}}",
            "{{$student->psurname}}",
            "{{$student->year}}",
            "{{ucwords(strtolower($student->school))}}",
            "<a href='{{action('StudentsController@show', $student->id)}}' class='btn btn-primary'>View Pupil </a>"
        ],
    @endforeach
]
</script>

<script>
$(document).ready(function() {
    $('#studentTable')
    .DataTable( {
        data: data,
        processing : true,
        language: {
            loadingRecords: '&nbsp;',
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
        },
        //  "serverSide": true,
            columnDefs: [
                {
                    targets: [0],
                    orderData: [1,0]
                },
        ]
    });
});
</script>
@endsection
