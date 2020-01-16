@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 ">
            <div class="card">
                <div class="card-header">{{ __('FCAT Login') }}</div>
                <div class="card-body">
                    <div class="col">
                        <a href="{{url('/redirect')}}" class="btn btn-primary btn-block btn-lg"><i class="fab fa-google fa-fw fa-lg"></i>&nbsp;&nbsp;Login with FCAT Google Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
