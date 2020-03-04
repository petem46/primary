@extends('layouts.app')

@section('content')


<div class="container v-application">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="v-card pa-10 text-center">
                <div class="v-card__header">
                  <h1 class="display-1">FCAT FOCUS - MyDataDash</h1>
                </div>
                <div class="v-card__text">
                    <div class="v-col">
                        <a href="{{url('/redirect')}}" class="v-btn v-btn--contained theme--dark v-size--default teal darken-1"><i class="fab fa-google fa-fw fa-lg"></i>&nbsp;&nbsp;Sign In with FCAT Google Account</a>
                    </div>
                  </div>
                  <div class="v-card__text">
                    <div class="v-col">
                  <img class="img-fluid d-block mx-auto" style="height: 40px;" src="{{ URL::to('/img/FCAT-LOGO.jpg')}}" alt="">
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
