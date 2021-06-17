@extends('layouts.sidebarPages')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="">
                <!-- Row of the page contents -->
                    <div class="row mt-5 mb-5">
                        
                        <div class="col-md-6 offset-md-3">
                            <div class="box-shadow-2 p-0">
                                <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                    <div class="card-header border-0 pb-0">
                                        <div class="card-title text-center mb-2">
                                            <h1 class="crt-acc"><b>Friend Requests</b></h1>
                                        </div>
                                        
                                    </div>
                                    <div class="card-content container">
                                      {{-- \\\\\\\\\\\\\\ --}}
                                    @foreach($users as $user)
                                        <div class="text-center mb-2 card bg-gray p-2">
                                            <a href="#" class=" border-0">
                                                <div class="media-left pr-1">
                                                    <span class="avatar avatar-md"><img class="media-object rounded-circle" src=" {{$user->avatar}} "
                                                            alt="Generic placeholder image">
                                                        <i></i>
                                                    </span>
                                                </div>
                                                <div class="media-body w-100 mt-1">
                                                    <h2 class="list-group-item-heading"> {{$user->name}} <span class="font-small-3 float-right info">
                                                            </span></h2>
                                                    <p class="list-group-item-text text-muted mb-0">
                                                        <div class="text-center">
                                                            <a class="btn btn-success btn-sm mr-1 mb-1" href=" {{url('acceptFriendRequest/'.$user->id)}} " role="button"><i class="la la-close">Accept</i></a>
                                                            <a class="btn btn-danger btn-sm mr-1 mb-1" href="  {{url('rejectFriendRequest/'.$user->id)}}  " role="button"><i class="la la-close">Reject</i></a>
                                                        </div>
                                                </div>
                                                <div>
                                                    
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </section>
                    

            </div>
        </div>
    </div>
@endsection