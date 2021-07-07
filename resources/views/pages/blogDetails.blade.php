@extends('layouts.sidebarPages')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body container">
                <section id="pagination">
                    <div class="row">                  
                        <div class="col-md-3">
                            <div class="row match-height">
                                @foreach($randomPosts as $randomPost)
                                    <div class="col-md-12 mb-3">
                                        <a href="{{url('blogDetails/'.$randomPost->slug)}}">
                                            <div class="card">
                                                <div class="card-content">
                                                <img class="card-img-top img-fluid" src=" {{asset($randomPost->image)}} " alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title"><b>{{$randomPost->title}}</b></h4>
                                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                                                </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div> 
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row match-height">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <img class="card-img-top fixed-crop" src=" {{asset($post->image)}} " alt="Card image cap">
                                            <div class="card-body">
                                                <h4 class="card-title"><b> {{$post->title}} </b></h4>
                                                <p class="card-text"> {!!$post->body!!} </p>


                                                    <div>
                                                        <div class="card-title text-left mb-2 mt-4">
                                                            <h5 class="crt-acc">Comments</h5>
                                                        </div>
                                                        @foreach($post->comments as $comment)
                                                            {{-- Comment Start --}}
                                                            <div class="card mb-0 bg-gray">
                                                                @include('pages.partials.comment-list')
                                                            </div>
                                                            {{-- Comment End --}}

                                                    </div>
                                                    {{-- Reply Form --}}
                                                    @if (Auth::user())
                                                        <div class="reply-form-{{$comment->id}} hidden">
                                                            <div class="card-header border-0 pb-0">
                                                                <div class="card-title mb-2">
                                                                    <h5 class="crt-acc"><b>Add your Reply</b></h5>
                                                                </div> 
                                                            </div>
                                                            <div class="card-content container">
                                                                <form class="form" method="POST" action="{{route('replycomment.store',$comment->id)}}">
                                                                    @csrf
                                                                    <div class="form-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <textarea id="userinput8" rows="1" class="form-control " name="comment" placeholder="Add your Reply"></textarea>                                                    
                                                                                </div>
                                                                            </div>                                                        
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <button type="submit" class="btn btn-orange">Submit Reply</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <div class="card border-grey border-lighten-3 px-1 py-1 m-0">                                              
                                                            {{-- Reply List Start --}}
                                                                @foreach($comment->comments as $reply)
                                                                    @include('pages.partials.reply-list')

                                                                @endforeach
                                                            {{-- Reply List End--}}
                                                        @endforeach
                                                        {{-- include Comment Form --}}
                                                        @include('pages.partials.comment-form')
                                                    </div>
                                            </div>
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
    <script>
        function toggleReply(commentId){
            $('.reply-form-'+commentId).toggleClass('hidden');
        }
    </script>
@endsection

