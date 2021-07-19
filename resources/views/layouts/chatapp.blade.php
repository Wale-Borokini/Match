<!DOCTYPE html>
<html lang="en" data-textdirection="ltr">
  <head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title> {{$title}} </title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/simple-line-icons/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/chat-application.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/js/gallery/photo-swipe/photoswipe.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/js/gallery/photo-swipe/default-skin/default-skin.css') }}">

    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu content-left-sidebar chat-application  menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="content-left-sidebar">

    <div id="app">
        @include('inc.sidebarNav')
            @include('inc.sidebar')
            @include('inc.messages')
            @yield('content')
    </div>
         
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/chat-application.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/gallery/masonry/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/gallery/photo-swipe/photoswipe.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/gallery/photo-swipe/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/gallery/photo-swipe/photoswipe-script.js')}}"></script>
    <!-- END PAGE LEVEL JS-->
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
  
              
  
          var channelFetch = pusher.subscribe('fetch-chats');
          channelFetch.bind('fetch-users', function() {
          
              //users;
              
              
      
          });
  
          
            //   $.ajax({
            //       type:"get",
            //       url: "userslist", //need to create their route
            //       data: "",
            //       cache: false,
            //       success: function (data) {
            //           $('#userslist').html(data);
                    //   });
                    

                      $('.user').click(function (){
                        //   $("#userslist").hide();
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
             
             
  
  
          var channel = pusher.subscribe('my-channel');
              channel.bind('message-sent', function(data) {
            //   alert(JSON.stringify(data.datas));
              if (my_id == data.datas.from) {
                  $('#' + data.datas.to).click();
              } else if (my_id == data.datas.to) {
                  if (receiver_id == data.datas.from) {
                      //If receiver is selected, reload the selected user..
                      $('#' + data.datas.from).click();
                  } else {
                      // if receiver is not seleted, add notification for that user
                      var pending = parseInt($('#' + data.datas.from).find('.pending').html());
  
                    //   if (pending) {
                    //       $('#' + data.datas.from).find('.pending').html(pending + 1);
                    //   } else {
                    //       $('#' + data.datas.from).append('<span class="pending">1</span>');
                    //   }
                  }
              }
  
          });

          // channel.bind('client-message-delivered', onMessageDelivered);
  
          // function onMessageDelivered(data) {
          //     $("#" + data.id +'_message'.text("Some Content");
          // }
                        
              
  
          //
  
          $(document).on('click', '#sendMess', function (e) {              
              var message = $('#body').val();
              var image = document.querySelector('#myform input[name=image]');
              // Creating an instance of FormData to submit the form.
              var formData = new FormData();

              formData.append('message', $("#myform textarea[name=message]").val());
              formData.append('image', image.files[0]);
              formData.append('receiver_id', receiver_id);
            //   var image = $('#upload').val();
              //var submit = $(this).val();
              // message != '' && 
              // Check if enter key is pressed and mesage is not null also if receiver is selected
              if (receiver_id != '' && message != '' || image.value.length != 0) {
                // alert(receiver_id);
                 // $('#textMessage').val(''); //When pressed text box will be empty
  
                //   var datastr = "receiver_id=" + receiver_id + "&message=" + message + "&image=" + image;
                
               
                
                // Disable SendMessage Button onClick
                $("#sendMess").prop('disabled', true);

                  $.ajax({
                      type: "post",
                      enctype: 'multipart/form-data',
                      url: "chat", //nedd to create in controller
                      data: formData,
                      cache: false,
                      contentType: false,
                      processData: false,
                      success: function (data) {
                        $("#sendMess").prop('disabled', false);
                            $('#' + receiver_id + '_message').text($("#myform input[name=message]").val())
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