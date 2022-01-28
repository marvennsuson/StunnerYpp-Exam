<!DOCTYPE html>

<html lang="en" class="default-style layout-fixed layout-navbar-fixed">
<head>
    <title> Song Hits 2022 </title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- For Mobile View -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <!-- Description of website -->
    <meta name="description" content="songhits" />
    <!-- For Search engine -->

    <link rel="icon" type="image/x-icon" href="{{asset('logo.jpg')}}">
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('system/css/pages/authentication.css')}}">
    @include('frontend._components.styles')
    @yield('page-styles')
</head>

<body >
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
            
            <div class="demo-navbar-user nav-item ">
                <span class="d-inline-flex align-items-center align-middle">
                    <span class="px-1 mr-lg-2 ml-2 ml-lg-0">Home</span>|
                    <span class="px-1 mr-lg-2 ml-2 ml-lg-0">Categories</span>|
                    <span class="px-1 mr-lg-2 ml-2 ml-lg-0"> <a href="{{ route('system.login') }}"> Login </a><i class="fas fa-user"></i></span>
                </span>
            </div>
        </div>
    </div>
</nav>
<!-- [ Layout navbar ( Header ) ] End -->
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>

    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <!-- [ Layout sidenav ] Start -->
            <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-white logo-white">
                <!-- Brand demo (see assets/css/demo/demo.css) -->
                <div class="app-brand demo mt-3">
                    <img src="{{asset('logo.jpg')}}" alt="Brand Logo" style="height: 100%; width: 60%; margin:auto; object-fit: contain;">
                </div>
                <div class="sidenav-divider mt-0"></div>

                <!-- Links -->
           
            </div>
            <!-- [ Layout sidenav ] End -->
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                {{-- @include('frontend._components.header') --}}
                <!-- [ Layout content ] Start -->
                <div class="layout-content">

                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <h4 class="font-weight-bold py-3 mb-0"> Song Hits</h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                    
                        </div>
                        @yield('content')
                    </div>
                    <!-- [ content ] End -->
                    <!-- Footer -->
                </div>
                <!-- [ Layout content ] Start -->
            </div>
            <!-- [ Layout container ] End -->
        </div>
        <!-- Overlay -->
        {{-- <div class="layout-overlay layout-sidenav-toggle"></div> --}}
    </div>
    <!-- [ Preloader ] End -->
    <!-- [ content ] Start -->

   
    <!-- [ content ] End -->

    <!-- Core scripts -->
    @include('frontend._components.scripts')
    @yield('page-scripts')
</body>

</html>
