<div class="card-body bg-white ml-md-5">
    <h5 class="card-title">
        <span class="avatar avatar-sm avatar"><img class="media-object rounded-circle" src=" {{asset($reply->user->avatar)}} "
        alt="image"></span>
        @if($comment->user->visibility == $publiclyVis)
            {{$reply->user->name}}
        @elseif($comment->user->visibility == $privatelyVis)
            {{$reply->user->alias}}
        @else
            {{$reply->user->name}}
        @endif
    </h5>
    <p class="">{{$reply->comment}}</p>
    <p class=""><small class="text-muted">{{$comment->created_at->diffForHumans()}}</small></p>
</div>