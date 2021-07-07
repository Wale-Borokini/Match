@extends('layouts.sidebarPages')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
        <div class="content-body container">
            <section id="pagination">
            <div class="row">
                <div class="col-md-8 overflow-exp-chat">
                    <div class="row match-height">
                        @foreach($users as $user)
                        {{-- @if($user->id != ) --}}
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="card userSug" id="{{ $user->id }}">
                                    <div class="card-content">
                                    <img class="card-img-top img-respx" src="{{ $user->avatar }}" alt="{{ $user->name }}">
                                    <div class="card-body">
                                        @if($user->visibility == $publiclyVis)
                                            <h4 class="card-title">{{ $user->name }}</h4>
                                        @elseif($user->visibility == $privatelyVis)
                                            <h4 class="card-title">{{ $user->alias }}</h4>
                                        @else
                                            <h4 class="card-title">{{ $user->name }}</h4>
                                        @endif
                                        {{-- <p class="card-text">  </p>
                                            <div class="text-center">
                                                <button class="btn btn-danger btn-md rounded-circle mr-2"><i class="la la-close"></i></button>
                                                {{-- @if(!empty($friendrequest)) --}}
                                                {{-- <a href="{{ url('/add-friend/'.$user->slug) }}" class="btn btn-success btn-md rounded-circle"><i class="la la-heart"></i></a> --}}
                                                {{-- @endif --}}
                                            {{-- </div>  --}}
                                    </div>
                                    </div>
                                </div>
                            </div>
                        {{-- @endif --}}
                        @endforeach

                    </div>
                </div>
                <div class="col-md-4" id="fetchSug">
                    
                </div>
            </div>
            </section>
        </div>
        </div>
    </div>
@endsection