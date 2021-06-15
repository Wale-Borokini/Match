@extends('layouts.main')

@section('content')
    <div class="vertical-layout vertical-compact-menu bg-transparent 1-column bg-lighten-2 menu-expanded blank-page blank-page">
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
                    <!-- Card overlay section start -->
                    <div class="mt-5 mb-5">
                        <h1 class="text-center header-match">Match To Be One</h1>
                    </div>
                    <section id="card-overlay" class="mt-5">
                        <div class="row match-height">
                            <div class="col-xl-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-content">
                                        <img class="card-img-top img-fluid" src="app-assets/images/carousel/couples-pic.png" alt="Card image cap"/>
                                        <div class="card-body">
                                            <div class="container mt-5">
                                                <p class="card-text">Jelly-o sesame snaps cheesecake topping. Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar muffin. Dessert bonbon caramels brownie chocolate bar chocolate tart dragée.</p>
                                                <p class="card-text">Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar muffin.
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                    <!-- Card overlay section end -->
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection