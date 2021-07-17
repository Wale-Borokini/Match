@extends('layouts.chatapp')

@section('content')
    <div class="content">
        <div class="row">
            {{-- id="userslist" --}}
            <div id="userslist" class="col-md-4">
                <div class="my-custom-scrollbar my-custom-scrollbar-primary">
                    <div class="overflow-class-chat">
                        <div class="content-wrapper">
                            @foreach($users as $user)
                                @if(Auth::id() != $user->id)
                                    <div class="media-list mb-2 card user" id="{{ $user->id }}">            
                                        <div class="media border-0">
                                            <div class="media-left pr-1">
                                                {{--will show unread count notification--}}
                                            @if($user->is_read == 0 && $user->msg_to == Auth::id())
                                                <span class="pending badge badge-pill badge-warning"><i class="la la-envelope font-medium-1"></i></span>
                                            @endif
                                                <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle" src="{{ $user->avatar }}"
                                                        alt="Generic placeholder image">
                                                    <i></i>
                                                </span>
                                            </div>
                                            <div class="media-body w-100">
                                                <h6 class="list-group-item-heading">{{ $user->name }}<span class="font-small-3 float-right info">
                                                    {{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</span></h6>
                                                @if($user->msg_from == Auth::id() or $user->msg_to == Auth::id())
                                                <p class="list-group-item-text text-muted mb-0" id="{{$user->id.'_message'}}"><i class=" primary font-small-2"></i> {{ $user->message}}
                                                @endif                                            
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach        
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8" id="messages">
                
                
            </div>
        </div>
    </div>
    
@endsection
