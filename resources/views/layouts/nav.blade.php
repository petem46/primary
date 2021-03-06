<nav class="navbar navbar-dark navbar-expand-lg bg-primary shadow-sm p-0">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fab fa-lg fa-expeditedssl"></i>  FOCUS
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user-circle fa-2x fa-fw"></i><br>{{ __('Login') }}</a>
                </li>
                <li class="nav-item mr-3 d-none">
                    <a class="nav-link text-center" href="{{url('/')}}"><i class="fas fa-th fa-2x fa-fw"></i><br><span class="d-lg-none_">Dashboard</a>
                </li>
            @else
                <li class="nav-item mr-3">
                    <a class="nav-link text-center" href="{{url('/dev/' . App\User::first()->getSchool()) }}"><i class="fas fa-th fa-2x fa-fw"></i><br><span class="d-lg-none_">Dev</a>
                </li>
                @if (App\User::first()->getSchool() === 'FCAT')
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fas fa-th fa-2x fa-fw"></i><br><span class="d-lg-none_">Dashboards <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right1 shadow animated--fade-in" aria-labelledby="navbarDropdown">
                        <div class="dropdown-header text-upper">Trust</div>
                        <a class="dropdown-item" href="{{url('/analysis/' . App\User::first()->getSchool()) }}">FCAT</a>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-header text-upper">All Through</div>
                        <a class="dropdown-item" href="{{url('/analysis/Armfield') }}">Armfield</a>
                        <a class="dropdown-item" href="{{url('/analysis/Unity') }}">Unity</a>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-header text-upper">Secondary</div>
                        <a class="dropdown-item" href="{{url('/analysis/Aspire') }}">Aspire</a>
                        <a class="dropdown-item" href="{{url('/analysis/Garstang') }}">Garstang</a>
                        <a class="dropdown-item" href="{{url('/analysis/Montgomery') }}">Montgomery</a>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-header text-upper">Primary</div>
                        <a class="dropdown-item" href="{{url('/analysis/Gateway') }}">Gateway</a>
                        <a class="dropdown-item" href="{{url('/analysis/Hambleton') }}">Hambleton</a>
                        <a class="dropdown-item" href="{{url('/analysis/Mereside') }}">Mereside</a>
                        <a class="dropdown-item" href="{{url('/analysis/Westcliff') }}">Westcliff</a>
                        <a class="dropdown-item" href="{{url('/analysis/Westminster') }}">Westminster</a>
                    </div>
                </li>
                @else
                <li class="nav-item mr-3">
                    <a class="nav-link text-center" href="{{url('/analysis/' . App\User::first()->getSchool()) }}"><i class="fas fa-th fa-2x fa-fw"></i><br><span class="d-lg-none_">Dashboard</a>
                </li>
                @endif
                <li class="nav-item mr-3 d-none">
                    <a class="nav-link text-center" href="{{url('/attendancereporting') }}"><i class="fas fa-th fa-2x fa-fw"></i><br><span class="d-lg-none_">Attendance</a>
                </li>
                <li class="nav-item mr-3 d-none">
                    <a class="nav-link text-center" href="{{url('/conductreporting') }}"><i class="fas fa-th fa-2x fa-fw"></i><br><span class="d-lg-none_">Conduct</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link text-center" href="{{url('/analysis/assessment/' . App\User::first()->getSchool()) }}"><i class="fas fa-th fa-2x fa-fw"></i><br><span class="d-lg-none_">Assessment</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link text-center" href="{{url('/students')}}"><i class="fas fa-users fa-2x fa-fw"></i><br><span class="d-lg-none_">{{ __('Students') }}</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link text-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                        <i class="fas fa-user-circle fa-2x fa-fw"></i><br><span class="d-lg-none_">{{ __('Log Out') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        @if(isset(Auth::user()->avatar))
                            <img src="{{ Auth::user()->avatar }}" class="rounded-circle" alt="avatar" width="32" height="32" style="margin-right: 8px;">
                        @endif
                        <br>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li> --}}
            @endguest
        </ul>
    </div>
</div>
</nav>
