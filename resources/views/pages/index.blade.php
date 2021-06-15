@extends('layouts.main')

@section('content')
    <div class="vertical-layout vertical-compact-menu  1-column bg-lighten-2 menu-expanded blank-page blank-page">
        <!-- First Page Section Start -->
        <div class="bg-cyan">
            <div class="container" >   
                <nav class="header-navbar navbar-expand-sm navbar navbar-with-menu navbar-transparent border-grey border-lighten-2">
                    <div class="navbar-wrapper mt-3">
                        <div class="navbar-header">
                            <ul class="nav navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a href="{{ url('/') }}" class="navbar-brand nav-link"><img src="app-assets/images/logo/logo-dark2.png"
                                            alt="branding logo"></a>
                                </li>
                                <li class="nav-item d-md-none float-right"><a data-toggle="collapse" data-target="#navbar-mobile10"
                                        class="nav-link open-navbar-container"><i class="la la-bars pe-2x icon-rotate-right"></i></a></li>
                            </ul>
                        </div>
                        <div class="navbar-container content float-right">
                            <div id="navbar-mobile10" class="bg-white rounded collapse navbar-collapse">
                                <ul class="nav navbar-nav mr-auto">
                                    <li class="nav-item"><a class="nav-link"></a></li>
                                    <li class="nav-item"><a class="nav-link active" href="{{ url('/about') }}">About</a></li>
                                    <li class="nav-item"><a class="nav-link " href="{{ url('/blog') }}" role="button">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                                    <li class="nav-item"><a class="nav-link active"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="app-content content">
                    <div class="content-wrapper">
                        <div class="content-header row">
                        </div>
                        <div class="content-body">
                            <section class="">
                            <!-- Row of the page contents -->
                                <div class="row mt-5 mb-5">
                                    <div class="col-md-0">
                                        
                                    </div>
                                    <div class="col-md-5">
                                        <div class="box-shadow-2 p-0">
                                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                                <div class="card-header border-0 pb-0">
                                                    <div class="card-title text-center mb-3">
                                                        <h1 class="crt-acc"><b>Create Account</b></h1>
                                                        <p>By clicking Log In, you agree to our Terms. Learn how we
                                                        process your data in our Privacy Policy and Cookie Policy.</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body pt-0">
                                                    <a href="{{ route('register') }}" class="btn btn-outline-orange text-orange btn-block">Sign up with Email</a>
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <a href="#" class="btn btn-outline-orange text-orange btn-block">Login with Facebook</a>
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <a href="#" class="btn btn-outline-orange text-orange btn-block">Login with Google</a>
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <a href="#" class="btn btn-outline-orange text-orange btn-block">Login with Phone Number</a>
                                                    </div>
                                                    <div class="card-body pt-0 text-center">
                                                        <p><b>Already Registered?</b> <a class="text-link-orange" href="{{ route('login') }}">Log in</a></p>
                                                    </div>
                                                    <div class="card-body pt-0 text-center">
                                                        <p>I accept the Terms & Conditions. My data is
                                                        collected pursuant to the Privacy Policy.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        
                                    </div>
                                </div>
                            </section>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- First Page Section End -->

        <!-- Second Page Section start -->
        <div class="bg-white container mt-5">
            <div class="row">
                <div class="col-md-5">
                    <img class="card-img-top img-fluid" src="app-assets/images/carousel/home-bg-lft.png" alt="Card image cap"> 
                </div>
                <div class="col-md-7">
                    <div class="">
                        <div class="card-content">
                            <div class="card-body">
                                <h1 class="thick-org-header mb-2">More than just dating</h1>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <img class="card-img-top img-fluid" src="app-assets/images/carousel/home-bg-rt.png" alt="Card image cap"> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Second Page Section end -->
    </div>
@endsection