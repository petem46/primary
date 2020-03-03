@extends('layouts.dash')
@section('content')

    <app
    whodis="{{ Auth::user() }}"
    whodisname="{{ Auth::user()->name }}"
    whodisemail="{{ Auth::user()->email }}"
    whodisavatar="{{ Auth::user()->avatar }}"
    whodisschool="{{ $whodisschool }}"
    whodisid="{{ Auth::user()->id }}"
    whodisusergroup_id="{{ Auth::user()->usergroup_id }}"
    >
    </app>

@endsection
