@extends('layouts.sidebarPages')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="">
                <!-- Row of the page contents -->                                                                                                
                    <div class=" border-0 pb-0 mb-3 mt-3">
                        <div class="card-title bg-transparent text-center">
                            <h1 class="crt-acc"><b>Friend Requests</b></h1>
                        </div>                                        
                    </div>                                                                                                             
                    <div class="container" id="doctors-list">
                        <div class="row match-height">
                        @foreach($users as $user)
                            <div class=" col-xl-4 col-lg-4 col-md-6">
                                <div class="card">
                                    <img src="{{ asset($user->avatar)}}" alt="{{$user->avatar}}" class="card-img-top img-fluid rounded-circle w-25 mx-auto mt-1">
                                    <div class="card-body">
                                        <h6 class="card-title font-large-1 mb-0 text-center">{{$user->name}}</h6>                                                        
                                        <p class="font-medium-3 mb-2 text-center">{{$user->alias}}</p>
                                        <p class="font-small-3 text-center">{{$user->bio}}</p>
        
                                    </div>
                                    {{-- <i class="la la-tick">Accept</i> --}}
                                    <div class="card-footer mx-auto text-center">                                                    
                                        <a class="btn btn-outline-info btn-min-width mr-1 mb-1" href=" {{route('acceptFriendRequest', $user->slug)}} ">Accept</a>
                                        <a class="btn btn-outline-danger btn-min-width mr-1 mb-1" href="  {{route('rejectFriendRequest', $user->slug)}}  " >Reject</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach  
                        </div>
                    </div>                                                                                                                                                                            
                </section>
                    

            </div>
        </div>
    </div>
@endsection