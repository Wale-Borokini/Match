<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Development Styles --}}
    <style>
        ul {
            margin: 0;
            padding: 0;
        }

        li {
            list-style: none;
        }
        .user-wrapper, .message-wrapper {
            border: 1px solid #dddddd;
            overflow-y: auto;
        }

        .user-wrapper {
            height: 600px;
        }

        .user {
            cursor: pointer;
            padding: 5px 0;
            position: relative;
        }

        .user:hover {
            background: #eeeeee;
        }

        .user:last-child {
            margin-bottom: 0;
        }

        .pending {
            position: absolute;
            left: 13px;
            top: 9px;
            background: #b600ff;
            margin: 0;
            border-radius: 50px;
            width: 18px;
            height: 18px;
            line-height: 18px;
            padding-left: 5px;
            color: #ffffff;
            font-size: 12px;
        }

        .media-left {
            margin: 0 10px;
        }

        .media-left img{
            width: 64px;
            border-radius: 64px;
        }

        .media-body p {
            margin: 6px 0;
        }
        
        .message-wrapper {
            padding: 10px;
            height: 536px;
            background: #eeeeee;
        }

        .messages .message {
            margin-bottom: 15px;
        }

        .messages .message:last-child {
            margin-bottom: 0;
        }

        .received, .sent {
            width: 45%;
            padding: 3px 10px;
            border-radius: 10px;
        }

        .received {
            background: #ffffff;
        }

        .sent {
            background: #3bebff;
            float: right;
            text-align: right;
        }

        .message p {
            margin: 5px 0;
        }

         .date {
            color: #777777;
            font-size: 12px;
         }

         .active {
             background: #eeeeee;
         }

         input[type=text] {
             width: 100%;
             padding: 12px 20px;
             margin: 15px 0 0 0;
             display: inline-block;
             border-radius: 4px;
             box-sizing: border-box;
             outline: none;
             border: 1px solid #cccccc;
         }

         input[type=text]:focus{
             border: 1px solid #aaaaaa;
         }



    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">

                                <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"
                                style="border: 1px solid #cccccc; border-radius: 5px; width: 39px; height: auto; float:left; margin-right:7px; ">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var receiver_id = '';
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function () {
        // ajax setup for csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('320ee5f4fe0e767a8bb7', {
        cluster: 'eu',
        forceTLS: true,
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('message-sent', function(data) {
        //alert(JSON.stringify(data));
            if (my_id == data.datas.from) {
                $('#' + data.datas.to).click();
            } else if (my_id == data.datas.to) {
                if (receiver_id == data.datas.from) {
                    //If receiver is selected, reload the selected user..
                    $('#' + data.datas.from).click();
                } else {
                    // If receiver is not selected, add notifications for that user
                    var pending = parseInt($('#' + data.datas.from).find('.pending').html());

                    if (pending) {
                        $('#' + data.datas.from).find('.pending').html(pending + 1);
                    } else {
                        $('#' + data.datas.from).append('<span class="pending">1</span>');
                    }
                }
            }

        });

        $('.user').click(function (){
            $('.user').removeClass('active');
            $(this).addClass('active');
            $(this).find('.pending').remove();

            receiver_id = $(this).attr('id');
            $.ajax({
                type:"get",
                url: "message/" + receiver_id, //need to create their route
                data: "",
                cache: false,
                success: function (data) {
                    $('#messages').html(data);
                    scrollToBottomFunc();
                }
            });
        });

        $(document).on('keyup', '.input-text input', function (e) {
            var message = $(this).val();

            // Check if enter key is pressed and mesage is not null also if receiver is selected
            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                $(this).val(''); //When pressed text box will be empty

                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "message", //nedd to create in controller
                    data: datastr,
                    cache: false,
                    success: function (data) {

                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
            }
        });        
    });

    // make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50);
    }
</script>
</body>
</html>
