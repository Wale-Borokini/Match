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
                                <div class="card userSug" id="{{$user->slug}}">
                                    <div class="card-content">
                                    <img class="card-img-top img-respx" src="{{ $user->avatar }}" alt="Image">
                                    <div class="card-body">
                                        @if($user->visibility == $publiclyVis)
                                            <h4 class="card-title">{{ $user->name }}</h4>
                                        @elseif($user->visibility == $privatelyVis)
                                            <h4 class="card-title">{{ $user->alias }}</h4>
                                        @else
                                            <h4 class="card-title">{{ $user->name }}</h4>
                                        @endif                                         
                                            <div class="text-center d-lg-none">
                                                @if($user->state && $user->country != Null)
                                                <div class="badge text-center mb-1 badge-pill badge-success">{{$user->state}}, {{$user->country}}</div>
                                                @else
                                                <div class="badge text-center mb-1 badge-pill badge-success"></div>
                                                @endif
                                                <div>                                                                                                
                                                    <a href="{{ route('addFriend', $user->slug) }}" class="btn btn-success btn-md rounded-circle"><i class="la la-heart"></i></a>                                                
                                                </div>
                                            </div> 
                                    </div>
                                    </div>
                                </div>
                            </div>
                        {{-- @endif --}}
                        @endforeach

                    </div>
                </div>
                <div class="col-md-4 d-none d-lg-block" id="fetchSug">
                    
                </div>
            </div>
            </section>
        </div>
        </div>
    </div>
    <script>
        var sugUserId = '';
        $(document).ready(function () {
            // ajax setup for csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                                                    
            $('.userSug').click(function (){
                
                sugUserId = $(this).attr('id');
                $.ajax({
                    type:"get",
                    url: "displaySugUser/" + sugUserId, //need to create their route
                    data: "",
                    cache: false,
                    success: function (data) {
                        $('#fetchSug').html(data);                        
                    }
                });
            
            });                                                            

                
        });

    </script>
@endsection