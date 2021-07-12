@extends('layouts.mainFront')

@section('content')           
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Card overlay section start -->
                <div class="mt-2 mb-2">
                    <h1 class="text-center header-match">Match To Be One</h1>
                </div>
                <section id="card-overlay" class="mt-5">
                    <div class="row match-height">
                        <div class="col-md-10 offset-md-1">
                            <div class="card">
                                <div class="card-content">
                                    <div id="about-cv">
                                        <img class="card-img-top img-fluid" src="{{asset('app-assets/images/backgrounds/group-c-9.png')}}" alt="Card image cap"/>
                                    </div>
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
@endsection