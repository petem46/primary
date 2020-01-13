<footer class="bg-primary text-white text-center pb-5 d-none">
<hr>
<div class="row">
    <div class="col">
        FCAT
    </div>
    <div class="col">
        {{-- <a href="/"><img class="img-fluid mb-5 d-block mx-auto" style="height: 80px;" src="{{ URL::to('/img/FCAT-LOGO.jpg')}}" alt=""></a> --}}
        PETE
    </div>
    <div class="col">
    @guest
    @else
    @php
            if(isset(Auth::user()->email)) {
                $domain = explode("@", Auth::user()->email);
                $school = explode(".", $domain[1]);
                $school = ucfirst($school[0]);
            }
        @endphp
        <img src="{{ Auth::user()->avatar ?? '' }}" class="rounded-circle" alt="avatar" width="32" height="32" style="margin-right: 8px;"> <br>{{ Auth::user()->name ?? '' }}<br>
        {{-- {{ $school ?? '' }}<br> --}}
    </div>
    @endguest
</div>
</footer>
