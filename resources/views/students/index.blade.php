@extends('layouts.app')
@section('content')
<div class="container">
    <table id="studentTable" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Year</th>
                <th>School</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{$student->pforename}} </td>
                <td>{{$student->psurname}} </td>
                <td>{{$student->year}} </td>
                <td>{{ucwords(strtolower($student->school))}} </td>
                <td><a href="{{action('StudentsController@show', $student->id)}}" class="btn btn-primary">View  </a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div><!-- end containing of content -->
<script>
$(document).ready(function() {
    $('#studentTable').DataTable( {
        columnDefs: [
            {
                targets: [0],
                orderData: [1,0] },
        ]
    });
});
</script>
@endsection
