@extends('layouts.adminPages')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="">
                <!-- Row of the page contents -->
                    <div class="row mt-5 mb-5">
                        
                        <div class="col-md-5 offset-md-3">
                            <div class="box-shadow-2 p-0">
                                <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                    <div class="card-header border-0 pb-0">
                                        <div class="card-title text-center mb-2">
                                            <h1 class="crt-acc"><b>Edit Post</b></h1>
                                        </div>
                                        
                                    </div>
                                    <div class="card-content container">
                                        <form class="form" method="POST" action="{{ route('post.update', [$post->slug]) }}" enctype="multipart/form-data">
                                            @csrf
                                            {{-- @method('PUT') --}}
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" id="projectinput3" class="form-control" placeholder="Post Title" name="title" value=" {{$post->title}} ">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">                                                                           
                                                            <input type="file" id="projectinput3" class="form-control" name="image">                                                           
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea id="userinput8" rows="5" class="form-control " name="body" placeholder="Body">{{$post->body}}</textarea>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-orange btn-block">Create Post</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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