@extends('layouts.sidebarPages')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
        <div class="content-body container">
            <div class="mt-4 mb-3">
                <div class="card-title text-center mb-2">
                    @if(count($posts) <0)
                        <h1 class="crt-acc">No Blog Posts</h1>
                    @endif
                </div>                        
            </div>
            <section id="pagination">
                <div>
                    <div class="row match-height">
                        @foreach ($posts as $post)   
                            <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                                <a href="{{route('blogDetails', $post->slug)}}">
                                <div class="card">
                                    <div class="card-content">
                                    <img height="180" class="card-img-top" src=" {{asset($post->image)}} " alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title"><b> {{ str_limit($post->title, 21) }} </b></h4> 
                                        <p>{!! str_limit($post->body, 25) !!}</p>                                       
                                            {{$post->created_at->diffForHumans()}}
                                        <br>
                                        <b><i>Posted by {{$post->author}}</i></b>
                                    </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach                                                
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $posts->links() !!}
                    </div>
                </div>
            </section>
        </div>
        </div>
    </div> 
@endsection