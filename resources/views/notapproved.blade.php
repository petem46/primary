@extends('layouts.app')

@section('content')

@if(session('warning'))
@php $title = session('warning'); @endphp
  <script>notApproved('{{$title}}');</script>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Security Alert</div>

                <div class="card-body">
                    @if (session('warning'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('warning') }}
                        </div>
                    @endif

                    {{-- You are not allowed to log in! --}}
                </div>
            </div>
        </div>
    </div>
    <div>
      <a href="http://donkey.mydatadash.co.uk/logout"
         onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
      </a>

      <form id="logout-form" action="http://donkey.mydatadash.co.uk/logout" method="POST" style="display: none;">
          @csrf
      </form>
  </div>

</div>
@endsection
