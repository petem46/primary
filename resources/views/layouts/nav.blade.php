<nav class="navbar navbar-dark navbar-expand-lg bg-secondary shadow-sm p-0">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fab fa-lg fa-expeditedssl"></i>  FCAT Primary
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
                <li class="nav-item mr-3">
                    <a class="nav-link text-center" href="{{url('/')}}"><i class="fas fa-th fa-2x fa-fw"></i><br><span class="d-lg-none_">Dashboard</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link text-center" href="{{url('/students')}}"><i class="fas fa-cogs fa-2x fa-fw"></i><br><span class="d-lg-none_">{{ __('Students') }}</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link text-center" href="{{url('/logout')}}"><i class="fas fa-user-circle fa-2x fa-fw"></i><br><span class="d-lg-none_">{{ __('Log Out') }}</a>
                </li>
        </ul>
    </div>
</div>
</nav>
