<div class="content-wrapper">
    <div class="overflow-class-chat">
        <div class="content-body">
            <section class="chat-app-window message-wrapper">
            <div class="badge badge-default mb-1">
                Chat History
            </div>
            <div class="chats message-wrapper">
                <div class="chats">
                    @foreach($messages as $message)
                        <div class="{{ ($message->from == Auth::id()) ? 'chat' : 'chat-left' }}">
                            <div class="chat-body">
                                <div class="chat-content">
                                <p>{{ $message->message }}</p>
                                </div>
                                <div>
                                    @if($message->image != null)
                                    <img class="card-img-top img-fluid" src=" {{asset($message->image)}} " alt="Card image cap">
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
            {{-- <img src="#" id="category-img-tag" width="50px" height="50px"> --}}
            </section>
            <section class="chat-app-form">
                {{-- <form  method="POST" enctype="multipart/form-data"> --}}
                    @csrf
                    <div class="chat-app-input d-flex">
                        <fieldset class="form-group position-relative has-icon-left col-10 m-0">
                            <div class="form-control-position">
                            <i class="icon-emoticon-smile"></i>
                            </div>
                            <input type="text" class="form-control" name="message" id="textMessage" class="submit" placeholder="Type your message">
                            <div class="form-control-position control-position-right">
                            <input id="upload" name="image" type="file"/>
                            <i class="ft-image" id="upload_link"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left col-2 m-0">
                            <button type="button" class="btn btn-info" id="sendMess"><i class="la la-paper-plane-o"></i> <span class="d-none d-lg-block"></span></button>
                        </fieldset>
                    </div>
                {{-- </form> --}}
            </section>
        </div>
    </div>
</div>

<script>
    $(function(){
        $("#upload_link").on('click', function(e){
            e.preventDefault();
            $("#upload:hidden").trigger('click');
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#category-img-tag').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#upload").change(function(){
        readURL(this);
    });

</script>











    