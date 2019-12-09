@extends('layouts.app')
@section('content')
<div class="container">
  <!-- STUDENT ELEMENTS PANEL -->
        @foreach ($students as $student)
        <li class="list-group-item">
          <a href="{{action('StudentsController@show', $student->upn)}}" class="col-12 col-md-10 col-lg-6 mt-auto">
            {{$student->pforename}} {{$student->psurname}}
          </a>
        </li>
        @endforeach
</div><!-- end containing of content -->
@endsection
