@foreach($sugUsers as $sugUser)   
    <div class="card">
        <div class="card-content">
            <img class="img-res-syd card-img-top img-fluid" src="{{ $sugUser->avatar }}" alt="">
            <div class="card-body">
                @if($sugUser->visibility == $publiclyVis)
                    <h4 class="card-title">{{$sugUser->name}}</h4>
                @elseif($sugUser->visibility == $privatelyVis)
                    <h4 class="card-title">{{$sugUser->alias}}</h4>
                @else
                    <h4 class="card-title">{{$sugUser->name}}</h4>
                @endif
                <p class="card-text">
                    {{$sugUser->bio}}
                </p>

                <div class="text-center">                   
                    {{-- @if(!empty($friendrequest)) --}}
                        <a href="{{ url('/add-friend/'.$sugUser->slug) }}" class="btn btn-success btn-md rounded-circle"><i class="la la-heart"></i></a>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>
@endforeach