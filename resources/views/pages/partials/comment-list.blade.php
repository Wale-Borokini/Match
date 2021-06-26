<div class="card-body">
    <h5 class="card-title">
        <span class="avatar avatar-sm avatar"><img class="media-object rounded-circle" src=" {{asset($comment->user->avatar)}} "
        alt="image"></span>
        {{$comment->user->name}}
    </h5>
    <p class="card-text">{{$comment->comment}}</p>
    @if (Auth::user())
        <p class="card-text mb-0"> <button type="button" class="btn btn-secondary square btn-sm mr-1 mb-1" onclick="toggleReply('{{$comment->id}}')">Reply</button></p>
        <p class=""><small class="text-muted">3 mins ago</small></p>
    @endif    
</div>

    
