@extends('layouts.adminPages')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
        <div class="content-body container">
            <section id="pagination">
                <div>
                    <div class="row match-height">
                        @foreach ($posts as $post)   
                            <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                                <a href="{{route('blogDetails', $post->slug)}}">
                                <div class="card">
                                    <div class="card-content">
                                    <img class="card-img-top img-fluid" src=" {{asset($post->image)}} " alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title"> {{$post->title}} </h4>
                                        <p class="card-text text-center">
                                                                
                                            
                                            <form action="{{ route('post.delete', $post->slug) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('editBlogPost', $post->slug) }}" class="btn btn-outline-primary btn-sm ">Edit</a>
                                            <button type="submit" class="btn btn-outline-danger btn-sm  mr-2">Delete</button>
                                
                                            </form>                                            
                                        </p>
                                    </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
            </section>
        </div>
        </div>
    </div>    
@endsection