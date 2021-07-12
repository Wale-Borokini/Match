@extends('layouts.mainFront')

@section('content')
    <div class="app-content content">
        <div class="content-body">
            <!-- Card overlay section start -->
            <section id="card-overlay" class="mt-5 container">
                <div class="row match-height">
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-content">
                                <img class="card-img-top img-fluid" src="app-assets/images/backgrounds/group-c-9.png" alt="Card image cap"/>
                                <div class="card-body">
                                    <div class="container mt-3">
                                        <h1 class="mb-3 mt-3"><b>Lets Keep in Touch</b></h1>
                                        <p class="card-text">Jelly-o sesame snaps cheesecake topping. Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar muffin. Dessert bonbon caramels brownie chocolate bar chocolate tart dragée.
                                        Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar muffin.
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>

                                    <!-- Contact Form -->
                                    <div class="mt-5 container">
                                        <div class="form-group">
                                            <input class="form-control border-cont-form-orange" type="text" placeholder="First Name" id="userinput1">
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control border-cont-form-orange" type="text" placeholder="Last Name" id="userinput2">
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control border-cont-form-orange" type="email" placeholder="Email" id="userinput5">
                                        </div>

                                        <div class="form-group">
                                            <textarea id="userinput8" rows="5" class="form-control border-cont-form-orange" name="bio" placeholder="Message"></textarea>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mt-5">
                                            <button class="menu-title btn btn-orange btn-block">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Card overlay section end -->
        </div>
    </div>
@endsection