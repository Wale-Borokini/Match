@extends('layouts.adminPages')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="">
                <!-- Row of the page contents -->
                    <div class="row mt-5 mb-5">
                        
                        <div class="col-md-8 offset-md-2">
                            <div class="box-shadow-2 p-0">
                                <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                    <div class="card-header border-0 pb-0">
                                        <div class="card-title text-center mb-2">
                                            <h1 class="crt-acc"><b>Create Post</b></h1>
                                        </div>
                                        
                                    </div>
                                    <div class="card-content container">
                                        <form class="form" method="POST" action=" {{route('create.blogPost')}} " enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" id="projectinput3" class="form-control" placeholder="Post Title" name="title">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group text-center">
                                                            <img class="mb-2 hidden" src="#" id="category-img" width="100px" height="100px">
                                                            <input type="file" id="projectin" class="form-control" name="image" onclick="toggleCheck()">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea id="body" rows="5" class="form-control " name="body" placeholder=""></textarea>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-orange btn-block">Create Post</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </section>
                    

            </div>
        </div>
    </div>
    <script>

         function toggleCheck(){
            $('#category-img').toggleClass('hidden');
        }
    
    </script>    
@endsection