@extends('layouts.sidebarPages')

    @section('content')
        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="">
                        <form method="POST" action="{{ route('profile.update')}}">
                            @csrf
                            <!-- Row of the page contents -->
                            <div class="row mt-5 mb-5">
                                <div class="col-md-8 offset-md-2">
                                    <div class="box-shadow-2 p-0">
                                        <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                            <div class="card-header border-0 pb-0">
                                                <div class="card-title mb-2">
                                                    <h3 class="crt-acc"><b>General Information</b></h3>
                                                </div>                                     
                                            </div>
                                            <!-- Contact Form -->
                                            <div class="mt-1 container">
                                                <div class="form-group">
                                                    <input value="{{Auth::user()->name}}" name="name" class="form-control border-cont-form-orange" type="text" placeholder="Full Name" id="userinput1">
                                                </div>
                                                <div class="form-group mt-3 mb-2">                                                    
                                                    <div class="input-group">                                                        
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input value="Male" {{Auth::user()->sex == 'Male' ? 'checked' : '' }} type="radio" name="sex" class="custom-control-input" id="yes">
                                                            <label class="custom-control-label" for="yes">Male</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input value="Female" {{Auth::user()->sex == 'Female' ? 'checked' : '' }} type="radio" name="sex" class="custom-control-input" id="no">
                                                            <label class="custom-control-label" for="no">Female</label>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <input value="{{Auth::user()->alias}}" name="alias" class="form-control border-cont-form-orange" type="text" placeholder="Alias" id="userinput">
                                                </div>                                                
                                                <div class="form-group mt-3 mb-4">
                                                    <p><strong>Visibility</strong></p>
                                                    <div class="input-group">                                                        
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input value="Public" {{Auth::user()->visibility == 'Public' ? 'checked' : '' }} type="radio" name="visibility" class="custom-control-input" id="yes1">
                                                            <label class="custom-control-label" for="yes1">Public</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input value="Private" {{Auth::user()->visibility == 'Private' ? 'checked' : '' }} type="radio" name="visibility" class="custom-control-input" id="no1">
                                                            <label class="custom-control-label" for="no1">Private</label>
                                                        </div>
                                                    </div>
                                                </div>                                                                                                                                           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Row of the page contents -->
                            <div class="row mt-5 mb-5">
                                <div class="col-md-8 offset-md-2">
                                    <div class="box-shadow-2 p-0">
                                        <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                            <div class="card-header border-0 pb-0">
                                                <div class="card-title mb-0">
                                                    <h3 class="crt-acc"><b>Age Filter</b></h3>
                                                </div>                                            
                                            </div>
                                            <div class="form-group mt-1 mb-0 p-2">
                                                <div class="input-group">
                                                    <div class="mb-3">
                                                        <label id="labelTemp"> {{Auth::user()->age}} </label>
                                                    </div>
                                                    <input id="bar" name="age" type="range" min="25" max="55" step="10" val="25" class="slider"/>
                                                    <input id="slider" type="hidden" name="age" value="Between 25 and 35" />                                                                                                
                                                </div>
                                                <div class="mt-2 p-1">
                                                    <p><i>Slide the orange ball above to the left or right to select your age range.</i></p>
                                                </div> 
                                            </div>
                                                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Row of the page contents -->
                            <div class="row mt-5 mb-5">
                                <div class="col-md-8 offset-md-2">
                                    <div class="box-shadow-2 p-0">
                                        <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                            <div class="card-header border-0 pb-0">
                                                <div class="card-title mb-2">
                                                    <h3 class="crt-acc"><b>Location</b></h3>
                                                </div>                                            
                                            </div>
                                            <div class="mt-1 container">
                                                <div class="form-group col-md-6">                                                    
                                                    <select id="country" name="country" class="form-control">
                                                        <option>{{Auth::user()->country}}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">                                                    
                                                    <select id="state" name="state" class="form-control">
                                                        <option>{{Auth::user()->state}}</option>
                                                    </select>
                                                </div>                                                                                                                                          
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Row of the page contents -->
                            <div class="row mt-5 mb-5">
                                <div class="col-md-8 offset-md-2">
                                    <div class="box-shadow-2 p-0">
                                        <div class="card border-lighten-3 px-1 py-1 m-0">                                        
                                            <div class="mt-1 container">
                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="btn btn-orange btn-block">Submit</button>
                                                </div>                                                                                                                                                                                    
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>                        
                </div>
            </div>
        </div>
    
    <script src="{{ asset('countries/countries.js')}}"></script>
    <script>
        populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
        // populateCountries("country2");
        // populateCountries("country2");    
    
    </script>
    @endsection