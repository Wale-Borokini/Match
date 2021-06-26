<div class="card-body bg-white ml-md-5">
    <h5 class="card-title">
        <span class="avatar avatar-sm avatar"><img class="media-object rounded-circle" src=" {{asset($reply->user->avatar)}} "
        alt="image"></span>
        {{$reply->user->name}} 
    </h5>
    <p class="">{{$reply->comment}}</p>
    <p class=""><small class="text-muted">3 mins ago</small></p>
</div>