@extends('layouts.sidebarPages')

    @section('content')
        <div class="app-content content">
            <div class="content-wrapper give-min-ht">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <div class="mt-4 mb-3">
                        <div class="card-title text-center mb-2">
                            <h1 class="crt-acc"><b>My Profile</b></h1>
                        </div>                        
                    </div>
                    <section id="user-profile-cards-with-cover-image" class="row mt-2">                       
                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="card profile-card-with-cover">                                
                                <div class="card-img-top img-fluid bg-cover height-200" style="background: url({{asset('app-assets/images/carousel/wall.jpg')}});"></div>
                                <div class="card-profile-image">
                                    <a id="upload_link">
                                        <img width="140" height="140" src="{{asset(Auth::user()->avatar)}}"  class="rounded-circle img-border box-shadow-1" alt="Card image">
                                        <p class="text-blue-p">Change Profile Picture</p>
                                    </a>
                                    <form action="{{route('profile.change')}}" method="POST" enctype="multipart/form-data" id="myform">
                                        @csrf
                                        <input id="upload" name="avatar" type="file"/>                                       
                                    </form>
                                </div>
                                <div class="profile-card-with-cover-content text-center">
                                    <div class="card-body">
                                        <h2 class="mt-2">{{Auth::user()->name}}</h2>
                                        <h4 class="card-subtitle mt-1 mb-1 text-muted">{{Auth::user()->alias}}</h4>
                                        @if(Auth::user()->state && Auth::user()->country != Null)                                        
                                        <h6 class="card-subtitle text-muted">{{Auth::user()->state}}, {{Auth::user()->country}}</h6>
                                        @else
                                        <h6 class="card-subtitle text-muted"></h6>
                                        @endif
                                        <div class="badge mt-1 badge-pill badge-warning">{{Auth::user()->sex}}</div>
                                        <div class="mt-2">
                                            <a href="{{route('editProfile')}}"><button type="" class="btn btn-sm btn-outline-warning">Edit Profile</button></a>
                                        </div>
                                    </div>                                   
                                </div>
                            </div>
                        </div>                       
                    </section>

                    <section class="mt-2" id="patient-profile">
                        <div class="row mt-5 mb-5">
                            <div class="col-md-12">
                                <div class="box-shadow-2 p-0">
                                    <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                        <div class="card-header border-0 pb-0">
                                            <div class="card-title mb-2">
                                                <h3 class="crt-acc"><b>Bio</b></h3>
                                            </div>                                     
                                        </div>
                                        <div class="p-1">
                                            <p>
                                                {!!Auth::user()->bio!!}
                                            </p>
                                            <div class="text-right">
                                                <a href="{{route('editProfile', '#userInputBio')}}"><button type="" class="btn btn-sm btn-outline-warning">Edit</button></a>
                                            </div>
                                        </div>                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row of the page contents -->
                        <div class="row mt-5 mb-5">
                            <div class="col-md-12">
                                <div class="box-shadow-2 p-0">
                                    <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                        <div class="card-header border-0 pb-0">
                                            <div class="card-title mb-0">
                                                <h3 class="crt-acc"><b>Work</b></h3>
                                            </div>                                            
                                        </div> 
                                        <div class="p-1">
                                            <p>
                                               {!!Auth::user()->work!!}
                                            </p>
                                            <div class="text-right">
                                                <a href="{{route('editProfile', '#userInputWork')}}"><button type="" class="btn btn-sm btn-outline-warning">Edit</button></a>
                                            </div>
                                        </div>                                                                                                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row of the page contents -->
                        <div class="row mt-5 mb-5">
                            <div class="col-md-12">
                                <div class="box-shadow-2 p-0">
                                    <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                        <div class="card-header border-0 pb-0">
                                            <div class="card-title mb-2">
                                                <h3 class="crt-acc"><b>Education</b></h3>
                                            </div>                                            
                                        </div>
                                        <div class="p-1">
                                            <p>
                                                {!!Auth::user()->education!!}                                                
                                            </p>
                                            <div class="text-right">
                                                <a href="{{route('editProfile', '#userInputEdu')}}"><button type="" class="btn btn-sm btn-outline-warning">Edit</button></a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- IMAGE GALLERY  --}}
                        @if(count($user->images) !== 0)                                                              
                            <div style="" class="card-content">
                                <div class="card-body my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                                    <div class="row">                                                                                                        
                                        @foreach($user->images as  $userImage)                        
                                        <figure class="col-md-3 col-sm-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">                                    
                                            <a href="{{asset($userImage->image_url)}}" itemprop="contentUrl" data-size="480x360">
                                                <img width="100%" height="200px" class="img-thumbnail" src="{{asset($userImage->image_url)}}" itemprop="thumbnail" alt="Gallery Image" />
                                            </a>
                                        </figure>                                    
                                        @endforeach                                                                   
                                    </div>                                                            
                                </div>
                                <!--/ Image grid -->
                                <!-- Root element of PhotoSwipe. Must have class pswp. -->
                                <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                                    <!-- Background of PhotoSwipe. 
                                It's a separate element as animating opacity is faster than rgba(). -->
                                    <div class="pswp__bg"></div>
                                    <!-- Slides wrapper with overflow:hidden. -->
                                    <div class="pswp__scroll-wrap">
                                        <!-- Container that holds slides. 
                                PhotoSwipe keeps only 3 of them in the DOM to save memory.
                                Don't modify these 3 pswp__item elements, data is added later on. -->
                                        <div class="pswp__container">
                                            <div class="pswp__item"></div>
                                            <div class="pswp__item"></div>
                                            <div class="pswp__item"></div>
                                        </div>
                                        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                                        <div class="pswp__ui pswp__ui--hidden">
                                            <div class="pswp__top-bar">
                                                <!--  Controls are self-explanatory. Order can be changed. -->
                                                <div class="pswp__counter"></div>
                                                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                                                <button class="pswp__button pswp__button--share" title="Share"></button>
                                                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                                                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                                                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                                                <!-- element will get class pswp__preloader-active when preloader is running -->
                                                <div class="pswp__preloader">
                                                    <div class="pswp__preloader__icn">
                                                        <div class="pswp__preloader__cut">
                                                            <div class="pswp__preloader__donut"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                                <div class="pswp__share-tooltip"></div>
                                            </div>
                                            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                                            </button>
                                            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                                            </button>
                                            <div class="pswp__caption">
                                                <div class="pswp__caption__center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <a href="{{route('replacePicture')}}"><button type="" class="btn btn-md  btn-outline-warning">Add or Delete Pictures</button></a>                            
                            </div>
                        @endif
                        
                    </section> 
                </div>
            </div>
        </div>
        <script src="{{ asset('app-assets/vendors/js/gallery/masonry/masonry.pkgd.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/gallery/photo-swipe/photoswipe.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/gallery/photo-swipe/photoswipe-ui-default.min.js') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/gallery/photo-swipe/photoswipe-script.js')}}"></script>
        <script>
             $(function(){
                $("#upload_link").on('click', function(e){
                    e.preventDefault();
                    $("#upload:hidden").trigger('click');
                });
            });



            $(document).ready(function () {
                // ajax setup for csrf token
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $("#upload").change(function(e)  {                          
                                
                    
                    var image = document.querySelector('#myform input[name=avatar]');

                    // Creating an instance of FormData to submit the form.
                    var formData = new FormData();                                
                    formData.append('avatar', image.files[0]);
                                                    
                      $.ajax({
                          type: "post",
                          enctype: 'multipart/form-data',
                          url: "{{route('profile.change')}}", //nedd to create in controller
                          data: formData,
                          cache: false,
                          contentType: false,
                          processData: false,
                          success: function (data) {
                            location.reload();
                          },
                          error: function (jqXHR, status, err) {
                          }                      
                      })              
                });
            });

        </script>
    @endsection