@extends('layouts.sidebarPages')

    @section('content')
        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="">
                    <!-- Row of the page contents -->

                    <div class="card-content">
                        <div class="card-body">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img src="../../../app-assets/images/carousel/02.jpg" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../../../app-assets/images/carousel/03.jpg" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../../../app-assets/images/carousel/01.jpg" alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                        <div class="row mt-5 mb-5">
                            <div class="col-md-10 offset-md-1">
                                <div class="box-shadow-2 p-0">
                                    <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                        <div class="card-header border-0 pb-0">
                                            <div class="card-title mb-2">
                                                <h3 class="crt-acc"><b>About Me</b></h3>
                                            </div>                                     
                                        </div>
                                        <div class="p-1">
                                            <p>
                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi magni exercitationem repellendus dolor eius neque, provident culpa ipsam modi praesentium facere pariatur error ea voluptas eaque sunt doloremque velit itaque!
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum non ratione fuga iusto laboriosam. Id vel vitae quisquam animi obcaecati atque molestiae, sapiente, dignissimos aperiam suscipit deleniti iste eum eos.                                                
                                            </p>
                                        </div>                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row of the page contents -->
                        <div class="row mt-5 mb-5">
                            <div class="col-md-10 offset-md-1">
                                <div class="box-shadow-2 p-0">
                                    <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                        <div class="card-header border-0 pb-0">
                                            <div class="card-title mb-0">
                                                <h3 class="crt-acc"><b>Work</b></h3>
                                            </div>                                            
                                        </div> 
                                        <div class="p-1">
                                            <p>
                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi magni exercitationem repellendus dolor eius neque, provident culpa ipsam modi praesentium facere pariatur error ea voluptas eaque sunt doloremque velit itaque!
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum non ratione fuga iusto laboriosam. Id vel vitae quisquam animi obcaecati atque molestiae, sapiente, dignissimos aperiam suscipit deleniti iste eum eos.                                               
                                            </p>
                                        </div>                                                                                                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row of the page contents -->
                        <div class="row mt-5 mb-5">
                            <div class="col-md-10 offset-md-1">
                                <div class="box-shadow-2 p-0">
                                    <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                        <div class="card-header border-0 pb-0">
                                            <div class="card-title mb-2">
                                                <h3 class="crt-acc"><b>Education</b></h3>
                                            </div>                                            
                                        </div>
                                        <div class="p-1">
                                            <p>
                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi magni exercitationem repellendus dolor eius neque, provident culpa ipsam modi praesentium facere pariatur error ea voluptas eaque sunt doloremque velit itaque!
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum non ratione fuga iusto laboriosam. Id vel vitae quisquam animi obcaecati atque molestiae, sapiente, dignissimos aperiam suscipit deleniti iste eum eos.                                               
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                        

                </div>
            </div>
        </div>
    @endsection