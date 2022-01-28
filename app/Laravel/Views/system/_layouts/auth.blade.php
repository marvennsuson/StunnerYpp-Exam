<!DOCTYPE html>

<html lang="en" class="default-style layout-fixed layout-navbar-fixed">
<head>
    <title>Song Hits 2022  }}</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- For Mobile View -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <!-- Description of website -->
    <meta name="description" content="songhit" />
    <!-- For Search engine -->

    <link rel="icon" type="image/x-icon" href="{{asset('logo.jpg')}}">
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('system/css/pages/authentication.css')}}">
    @include('system._components.styles')
</head>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->
    <!-- [ content ] Start -->
        @yield('content')
    <!-- [ content ] End -->

    <!-- Core scripts -->
    @include('system._components.scripts')

</body>

</html>
