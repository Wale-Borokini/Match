@extends('layouts.sidebarPages')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper give-min-ht">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="">
                    <div class="mt-4 mb-3">
                        <div class="card-title text-center mb-2">
                            <h1 class="crt-acc"><b>Friend List</b></h1>
                        </div>                        
                    </div>
                <!-- Row of the page contents -->

                    <div class="container" id="doctors-list">
                        <div class="row match-height">
                        
                            <div class="col-lg-6 offset-lg-3 col-sm-12">                               
                                <div class="card text-left">
                                    
                                    <div class="card-body">
                                                                               
                                        @foreach($users as $user)
                                        <a id="createChat" href="{{ route('makeNewChat', $user->slug) }}">                                        
                                                                                        
                                        <h5 class="card-title">
                                            {{-- <i class="la la-comments"></i>  --}}
                                            <span class="avatar avatar-sm avatar"><img class="media-object rounded-circle" src=" {{asset($user->avatar)}} "
                                            alt="image"></span>
                                            {{$user->name}}
                                        </h5>
                                        </a>
                                        @endforeach  
                                    </div>                                    
                                    <div class="card-footer mx-auto text-center">                                                                                            
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