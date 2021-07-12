@extends('layouts.adminPages')

@section('content')
    <div class="app-content content">
        <div class="content-body">
        <div class="container mt-5"> <!-- Main Page Section Start -->               
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="info">8</h3>
                                        <h6>Administrators</h6>
                                    </div>
                                    <div>
                                        <i class="icon-basket-loaded info font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="warning">748</h3>
                                        <h6>Users</h6>
                                    </div>
                                    <div>
                                        <i class="icon-pie-chart warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">146</h3>
                                        <h6>Blog Posts</h6>
                                    </div>
                                    <div>
                                        <i class="icon-user-follow success font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="danger">99.89 %</h3>
                                        <h6>Customer Satisfaction</h6>
                                    </div>
                                    <div>
                                        <i class="icon-heart danger font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Row For Cards Start -->
            </div> <!-- Row For Cards End -->
                <div id="recent-appointments" class="col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                    <h4 class="card-title">Administrators</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                       
                    </div>
                    </div>
                    <div class="card-content mt-1">
                    <div class="table-responsive">
                        <table id="recent-orders-doctors" class="table table-hover table-xl mb-0">
                            <thead>
                        <tr>
                            <th class="border-top-0">Name</th>
                            <th class="border-top-0">Alias</th>
                            <th class="border-top-0">Email</th>
                            <th class="border-top-0">Sex</th>
                        </tr>
                            </thead>
                            <tbody>                        
                        <tr class="pull-up">
                            <td class="text-truncate"><img class="media-object rounded-circle avatar avatar-md pull-up" src="app-assets/images/portrait/small/avatar-s-6.png"
                                    alt="Avatar"><span class="mr-1"></span>Zena wall</td>
                            <td>
                            <button type="button" class="btn btn-sm btn-outline-success round">Gastroenterologist</button>
                            </td>
                            <td class="text-truncate">11:30 A.M. - 3:00 P.M.</td>
                            <td class="text-truncate">$ 1150.00</td>
                        </tr>
                        <tr class="pull-up">
                            <td class="text-truncate"><img class="media-object rounded-circle avatar avatar-md pull-up" src="app-assets/images/portrait/small/avatar-s-6.png"
                                    alt="Avatar"><span class="mr-1"></span> Colin Welch</td>
                            <td>
                            <button type="button" class="btn btn-sm btn-outline-danger round">Pediatrician</button>
                            </td>
                            <td class="text-truncate">5:00 P.M. - 8:00 P.M.</td>
                            <td class="text-truncate">$ 1180.00</td>
                        </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
        </div>  <!-- Main Page Section End --> 
        </div>
    </div> 
@endsection