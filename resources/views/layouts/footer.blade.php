<footer class="pb-2">
<hr>
<div class="container">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 text-center">
            <a href="/"><img class="img-fluid d-block mx-auto" style="height: 40px;" src="{{ URL::to('/img/FCAT-LOGO.jpg')}}" alt=""></a>
        </div>
        <div class="col-4 text-right">
            @guest @else
            <img src="{{ Auth::user()->avatar ?? '' }}" class="rounded-circle" alt="avatar" width="32" height="32" style="margin-right: 8px;"> {{ Auth::user()->name ?? '' }}
            @endguest
        </div>
    </div>
</div>

</footer>
