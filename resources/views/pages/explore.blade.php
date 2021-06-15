@extends('layouts.sidebarPages')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
        <div class="content-body container">
            <section id="pagination">
            <div class="row">
                <div class="col-md-8">
                    <div class="row match-height">
                        @foreach($users as $user)
                        {{-- @if($user->id != ) --}}
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-content">
                                    <img class="card-img-top img-respx" src="{{ $user->avatar }}" alt="{{ $user->name }}">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $user->name }}</h4>
                                        <p class="card-text">  </p>
                                            <div class="text-center">
                                                <button class="btn btn-danger btn-md rounded-circle mr-2"><i class="la la-close"></i></button>
                                                {{-- @if(!empty($friendrequest)) --}}
                                                <a href="{{ url('/add-friend/'.$user->name) }}" class="btn btn-success btn-md rounded-circle"><i class="la la-heart"></i></a>
                                                {{-- @endif --}}
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        {{-- @endif --}}
                        @endforeach

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                    <div class="card-content">
                        <img class="card-img-top img-fluid" src="app-assets/images/carousel/06.jpg" alt="Card image cap">
                        <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Icing powder caramels Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit.</p>

                        <div class="text-center">
                                <button type="button" class="btn btn-success btn-md rounded-circle mr-2"><i class="la la-close"></i></button>
                            <button type="button" class="btn btn-danger btn-md rounded-circle"><i class="la la-heart"></i></button>
                        </div>
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