@extends('layouts.adminPages')

@section('content')
    <div class="app-content content">
        <div class="content-body">
            <div class="container mt-5"> <!-- Main Page Section Start -->   
                    <div class="mt-4 mb-3">
                        <div class="card-title text-center mt-2 ">
                            <h1 class="crt-acc"><b>Give Admin Role</b></h1>
                        </div>                        
                    </div>                       
                    <div id="recent-appointments" class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                        <h4 class="card-title">Users</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                        
                        </div>
                        </div>
                        <div class="card-content mt-1">
                        <div class="table-responsive">
                            <table id="recent-orders-doctors" class="table table-hover table-xl mb-0">
                                <thead>
                            <tr>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Alias</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Sex</th>
                                <th class="border-top-0">Admin</th>
                            </tr>
                                </thead>
                                <tbody>
                            @foreach($users as $user)                        
                            <tr class="pull-up">
                                <td class="text-truncate"><a class="text-truncate" href="{{url('admin/viewUserProfile/'.$user->slug)}}"><img class="media-object rounded-circle avatar avatar-sm pull-up" src="{{asset($user->avatar)}}"
                                        alt="Avatar"><span class="mr-1"></span> {{ $user->name }} </a></td>
                                <td class="text-truncate"> {{$user->alias}} </td>
                                <td class="text-truncate"> {{$user->email}} </td>
                                <td class="text-truncate"> {{$user->sex}} </td>
                                <td>
                                    @if($user->super_admin)
                                    <button type="button" class="btn btn-sm btn-outline-dark round" disabled><i class="la la-star-o"></i></button>                            
                                    @elseif($user->admin)
                                    <a href="{{route('removeAdminRole',$user->slug)}}"><button type="button" class="btn btn-sm btn-outline-danger round">Yes</button></a>
                                    @else
                                    <a href="{{route('giveAdminRole',$user->slug)}}"><button type="button" class="btn btn-sm btn-outline-success round">No</button></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach                     
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    </div>
            </div>  <!-- Main Page Section End --> 
        </div>
    </div> 
@endsection