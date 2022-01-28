@extends('system._layouts.auth')
@section('content')    
    <div class="authentication-wrapper authentication-3">
        <div class="authentication-inner">
            
            <!-- [ Side container ] Start -->
            <!-- Do not display the container on extra small, small and medium screens -->
            <div class="d-none d-lg-flex col-lg-8 align-items-center ui-bg-cover ui-bg-overlay-container p-5" style="background-image: url('{{asset('system/img/bg/21.jpg')}}');">
                <div class="ui-bg-overlay bg-dark opacity-50"></div>
                <!-- [ Text ] Start -->
                <div class="w-100 text-white px-5">
                    <h1 class="display-2 font-weight-bolder mb-4">Rating App<br>Admin Login</h1>
                    <div class="text-large font-weight-light">
                        {{-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vehicula ex eu gravida faucibus. Suspendisse viverra pharetra purus. Proin fringilla ac lorem at sagittis. Proin tincidunt dui et nunc ultricies dignissim. --}}
                    </div>
                </div>
                <!-- [ Text ] End -->
            </div>
            <!-- [ Side container ] End -->
            
            <!-- [ Form container ] Start -->
            <div class="d-flex col-lg-4 align-items-center bg-white p-5">
                <!-- Inner container -->
                <div class="justify-content-center d-flex mx-auto"> <a href="{{ URL('admin/login') }}" class="btn btn-success btn-md">Login Here </a> </div>
            </div>
            <!-- [ Form container ] End -->
        </div>
    </div>
@endsection