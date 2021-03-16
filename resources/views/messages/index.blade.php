<div class="message-wrapper">
    <ul class="messages">
        @foreach($messages as $message)
            <li class="message clearfix">
                {{-- If message from id is equal to auth id, then it is sent by logged in user --}}
                <div class="{{ ($message->from == Auth::id()) ? 'sent' : 'received' }}">
                    <p>{{ $message->message }}</p>
                    <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
                </div>           
            </li>
        @endforeach

    </ul>
</div>
    <div class="row">
        <div class="col-md-9">
            <div class="input-text">
                <input type="text" name="message" class="submit">
            </div>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-dark mt-4" class="sendMess">Send</div>
        </div>
    </div>
    