<nav class="navbar navbar-dark navbar-expand-lg bg-info shadow-sm p-0">
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
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{url('/breaches')}}"><i class="fas fa-user-lock"></i> Data Breaches</a>
                </li> --}}
                <li class="nav-item mr-3">
                    <a class="nav-link text-center" href="{{url('/')}}"><i class="fas fa-th fa-2x fa-fw"></i><br><span class="d-lg-none_">Dashboard</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link text-center" href="{{url('/processors')}}"><i class="fas fa-network-wired fa-2x fa-fw"></i><br><span class="d-lg-none_">{{ config('settings.processorslabel', 'Processors') }}</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link text-center" href="{{url('/suppliers')}}"><i class="fas fa-piggy-bank fa-2x fa-fw"></i><br><span class="d-lg-none_">{{ config('settings.supplierslabel', 'Suppliers') }}</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link text-center"  href="{{url('/breaches')}}"><i class="fas fa-user-lock fa-2x fa-fw"></i><br><span class="d-lg-none_">Breaches</span></a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link text-center" href="{{url('/foirequests')}}"><i class="fas fa-id-card fa-2x fa-fw"></i><br><span class="d-lg-none_">FOI</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link text-center disabled" href="{{url('#')}}"><i class="fas fa-address-book fa-2x fa-fw"></i><br><span class="d-lg-none_">SAR</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link text-center" href="{{url('/vids')}}"><i class="fab fa-youtube fa-2x fa-fw"></i><br><span class="d-lg-none_">Vids</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link text-center disabled" href="{{url('#')}}"><i class="fas fa-file-contract fa-2x fa-fw"></i><br><span class="d-lg-none_">{{ __('Docs') }}</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link text-center" href="{{url('/adminsettings')}}"><i class="fas fa-cogs fa-2x fa-fw"></i><br><span class="d-lg-none_">{{ __('Admin') }}</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link text-center" href="{{url('/logout')}}"><i class="fas fa-user-circle fa-2x fa-fw"></i><br><span class="d-lg-none_">{{ __('Log Out') }}</a>
                </li>
        </ul>
    </div>
</div>
</nav>
