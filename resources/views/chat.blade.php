@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <h2>Sidebar</h2>
        </div>

        {{-- Commented --}}

        <div class="col-md-10">
            <div class="row">
                <div class="col-md-4">
                    {{-- Users List --}}
                    <div class="user-wrapper">
                        <ul class="user">
                            @foreach($users as $user)    
                                <li class="user" id="{{ $user->id }}">
                                    <span class="pending">1</span>
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{ $user->avatar }}" alt="" class="media-object">
                                        </div>
                                        <div class="media-body">
                                            <p class="name">{{ $user->name }}</p>
                                            <p class="email">{{ $user->email}}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
                {{-- Messages --}}
                <div class="col-md-8" id="messages">
                    <div class="message-wrapper">
                        <ul class="messages">
                            <li class="message clearfix">
                                <div class="sent">
                                    <p>Lorem ipsum dolor</p>
                                    <p class="date">1 Sep, 2021</p>
                                </div>           
                            </li>

                            <li class="message clearfix">
                                <div class="received">
                                    <p>Lorem ipsum dolor</p>
                                    <p class="date">1 Sep, 2021</p>
                                </div>           
                            </li>

                            <li class="message clearfix">
                                <div class="sent">
                                    <p>Lorem ipsum dolor</p>
                                    <p class="date">1 Sep, 2021</p>
                                </div>           
                            </li>

                            <li class="message clearfix">
                                <div class="received">
                                    <p>Lorem ipsum dolor</p>
                                    <p class="date">1 Sep, 2021</p>
                                </div>           
                            </li>

                            <li class="message clearfix">
                                <div class="sent">
                                    <p>Lorem ipsum dolor</p>
                                    <p class="date">1 Sep, 2021</p>
                                </div>           
                            </li>

                            <li class="message clearfix">
                                <div class="received">
                                    <p>Lorem ipsum dolor</p>
                                    <p class="date">1 Sep, 2021</p>
                                </div>           
                            </li>

                        </ul>
                    </div>
                    <div class="input-text">
                        <input type="text" name="message" class="submit">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
