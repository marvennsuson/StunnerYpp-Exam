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
                    <h1 class="display-2 font-weight-bolder mb-4">Song Hits 2022<br>Admin Login</h1>
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
                <!-- Have to add `.d-flex` to control width via `.col-*` classes -->
                <div class="d-flex col-sm-7 col-md-5 col-lg-12 px-0 px-xl-4 mx-auto">
                    <div class="w-100">
                        <!-- [ Logo ] Start -->
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="ui-w-1000">
                                <div class="w-100 position-relative">
                                    <img src="{{asset('logo.jpg')}}" alt="Brand Logo" class="img-fluid">
                             
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- [ Logo ] End -->
                        
                        <h4 class="text-center text-black-50 font-weight-bold mt-5 mb-0">Song Hits App</h4>
                        <h4 class="text-center text-lighter font-weight-normal mb-0">Admin Account</h4>
                        <div class="mt-3">
                            @include('system._components.notification')
                        </div>
                        <!-- [ Form ] Start -->
                        <form class="my-5" action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Username or Email</label>
                                <input type="text" name="username" id="password" placeholder="Username" class="form-control" value="{{old('username',session()->has('username') ? session()->get('username') : "")}}">
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label d-flex justify-content-between align-items-end">
                                    <span>Password</span>
                                </label>
                                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                                <div class="clearfix"></div>
                            </div>
                            <div class="d-flex justify-content-end align-items-center m-0">
                                <button class="btn btn-primary">Sign In</button>
                            </div>
                        </form>
                        <!-- [ Form ] End -->
                    </div>
                </div>
            </div>
            <!-- [ Form container ] End -->
        </div>
    </div>
@endsection