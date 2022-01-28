<!-- [ Layout navbar ( Header ) ] Start -->
<nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-white container-p-x" id="layout-navbar">

    <!-- Brand demo (see assets/css/demo/demo.css) -->
    <a href="{{route('system.dashboard.index')}}" class="navbar-brand app-brand demo d-sm-flex justify-content-sm-end py-0 mr-0">
        <span class="app-brand-logo demo d-sm-inline d-lg-none">
            <img src="{{ asset('hctlogo.png') }}" alt="Brand Logo" class="img-fluid" style="height: 50px;">
        </span>
        <span class="app-brand-text demo font-weight-normal ml-2"></span>
    </a>

    <!-- Sidenav toggle (see assets/css/demo/demo.css) -->
    <div class="layout-sidenav-toggle navbar-nav d-lg-inline align-items-lg-center mr-auto">
        <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:">
            <i class="ion ion-md-menu text-large align-middle"></i>
        </a>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="layout-navbar-collapse">
        <!-- Divider -->
        <hr class="d-lg-none w-100 my-2">
        <div class="navbar-nav align-items-lg-center ml-auto">
            <!-- Divider -->
            <div class="demo-navbar-user nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                    <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                        @if (Auth::user()->filename)
                            <img src="{{Auth::user()->directory.'/resized/'.Auth::user()->filename}}" alt class="d-block ui-w-30 rounded-circle">
                        @else
                            <img src="{{asset('system/img/avatars/default-avatar.png')}}" alt class="d-block ui-w-30 rounded-circle">
                        @endif
                        <span class="px-1 mr-lg-2 ml-2 ml-lg-0">{{Auth::user()->name}}</span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{route('system.profile.index')}}" class="dropdown-item">
                        <i class="feather icon-user text-muted"></i> &nbsp; My profile</a>
                    {{-- <a href="javascript:" class="dropdown-item">
                        <i class="feather icon-settings text-muted"></i> &nbsp; Account settings</a> --}}
                    <div class="dropdown-divider"></div>
                    <a href="{{route('system.logout')}}" class="dropdown-item">
                        <i class="feather icon-power text-danger"></i> &nbsp; Log Out</a>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- [ Layout navbar ( Header ) ] End -->