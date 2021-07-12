@extends('layouts.adminPages')

    @section('content')
        <div class="app-content content">
            <div class="content-wrapper">                
                <div class="content-body" style="margin-bottom:250px;">                    
                    <!-- Row of the page contents -->                                                                                                                            
                    
                    <section class="mt-4" id="patient-profile">
                        <div class="row match-height">
                            <div class="col-lg-5 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 d-flex justify-content-around">
                                                <div class="patient-img-name text-center">
                                                    <img src="{{asset($user->avatar)}}" alt="{{$user->avatar}}" class="card-img-top mb-1 patient-img img-fluid rounded-circle">
                                                    <h4>{{$user->name}}</h4>
                                                    <p><i>{{$user->alias}}</i></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 d-flex justify-content-around">
                                                <div class="patient-info">
                                                    <ul class="list-unstyled">                                                        
                                                        <li>
                                                            <div class="patient-info-heading">Sex:</div> {{$user->sex}}
                                                        </li>                                                      
                                                        <li>
                                                            <div class="patient-info-heading">Country:</div> {{$user->country}}
                                                        </li>
                                                        <li>
                                                            <div class="patient-info-heading">State:</div> {{$user->state}}
                                                        </li>
                                                        <li>
                                                            <div class="patient-info-heading">Visibility:</div> {{$user->visibility}}
                                                        </li>
                                                        <li>
                                                            <div class="patient-info-heading">Age Range:</div> {{$user->age}}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="card bg-gradient-y-warning">
                                    <div class="card-header">
                                        <h2 class="card-title text-white font-medium-3">Bio</h2>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-white font-medium-1"> {{$user->bio}} </p>                                       
                                    </div>
                                </div>
                            </div>
                           
                        </div>                                           
                        <div class="row">
                            <div class="col-lg-7 col-md-12">
                                <div class="card bg-gradient-y-info">
                                    <div class="card-header">
                                        <h2 class="card-title font-medium-3 text-white">Work</h2>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text font-medium-1 text-white"> {{$user->education}} </p>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="card text-white bg-gradient-y-danger">
                                    <div class="card-header">
                                        <h2 class="card-title text-white font-medium-3">Education</h2>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text font-medium-1"> {{$user->work}} </p>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>                                                                                                                                                          
                </div>
            </div>
        </div>
    @endsection