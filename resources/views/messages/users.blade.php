<div class="user-wrapper">
    <ul class="users">
        @foreach($users as $user)
            @if(Auth::id() != $user->id)
                <li class="user" id="{{ $user->id }}">
                    {{-- Will show unread count notification --}}
                    @if($user->is_read)
                        <span class="pending">{{ $user->is_read }}</span>
                    @endif

                    <div class="media">
                        <div class="media-left">
                            <img src="{{ $user->avatar }}" alt="" class="media-object">
                        </div>
                        <div class="media-body">
                            <p class="name">{{ $user->name }}</p>
                            <p class="email">{{ $user->email}}</p>
                            <p class="date">{{ date('d M Y, h:i a', strtotime($user->created_at)) }}</p>
                            <p class="email">{{ $user->message}}</p>
                        </div>
                    </div>
                </li>
            @endif

        @endforeach
    </ul>
</div>