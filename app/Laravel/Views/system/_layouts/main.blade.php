
<!DOCTYPE html>

<html lang="en" class="default-style layout-fixed layout-navbar-fixed">

<head>
    <title>Song Hits 2022 Admin</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- For Mobile View -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <!-- Description of website -->
    <meta name="description" content="songhits" />
    <!-- For Search engine -->

    <link rel="icon" type="image/x-icon" href="{{asset('logo.jpg')}}">

    <!-- Google fonts -->
    <link href="{{ asset('officialfont/stylesheet.css') }}" rel="stylesheet">
    @include('system._components.styles')
    @yield('page-styles')
</head>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <!-- [ Layout sidenav ] Start -->
            <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-white logo-white">
                <!-- Brand demo (see assets/css/demo/demo.css) -->
                <div class="app-brand demo mt-3">
                    <img src="#" alt="Brand Logo" style="height: 100%; width: 60%; margin:auto; object-fit: contain;">
                </div>
                <div class="sidenav-divider mt-0"></div>

                <!-- Links -->
                @include('system._components.sidebar')
            </div>
            <!-- [ Layout sidenav ] End -->
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                @include('system._components.header')
                <!-- [ Layout content ] Start -->
                <div class="layout-content">

                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <h4 class="font-weight-bold py-3 mb-0">{{$page_title}}</h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('system.dashboard.index') }}"><i class="feather icon-home"></i></a></li>
                                @yield('breadcrumb')
                            </ol>
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
    <!-- [ Layout wrapper] End -->

    @include('system._components.scripts')
    @yield('page-scripts')
</body>

</html>
