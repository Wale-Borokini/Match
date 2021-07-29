<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\User;
use App\Models\Message;
use App\Models\Comment;
use App\Models\Post;
use DB;

class AdminController extends Controller
{
    

    public function adminDashboard()
    {
        $title = 'Admin Dashboard';
        $users = User::all();
        $blogPosts = Post::all();
        $administrators = User::where('admin', '=', 1)->get();
        
        return view('adminPages.adminDashboard')->with(compact('title', 'users', 'blogPosts', 'administrators'));

    }

    public function adminRoles()
    {
        $userId = Auth::id();

        $title = 'Admin Role';
        $users = User::where('id', '!=', $userId)->get();
        
        return view('adminPages.roles')->with(compact('title', 'users'));

    }

    public function giveAdminRole($slug)
    {
                
        User::where(['slug'=> $slug, 'super_admin'=>null])->update(['admin'=>1]);
        return redirect()->back()->with('success', 'Role Given');
        
    }

    public function removeAdminRole($slug)
    {
                
        User::where(['slug'=> $slug, 'super_admin'=>null])->update(['admin'=>null]);
        return redirect()->back()->with('success', 'Role Removed');
        
    }

    public function viewUserProfile($slug)
    {
        $title = 'View User Profile';
                                 
        $user = User::where('slug', $slug)->firstOrFail();                   

        return view('adminPages.viewUserProfile')->with(compact('user', 'title'));
    }

    public function viewUsers()
    {
        $userId = Auth::id();
        $title = 'View Users';
                                 
        $users = User::where('id', '!=', $userId)->get();                 

        return view('adminPages.viewUsers')->with(compact('users', 'title'));
    }


    public function rolesSearch(Request $request){

        $title = 'Search Results';
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('alias', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('adminPages.rolesSearch')->with(compact('users', 'title'));
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('users')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('alias', 'like', '%'.$query.'%')         
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('users')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
        <td class="text-truncate"><a class="text-truncate" href='.route('viewUserProfile', $row->slug).'>
        <img class="media-object rounded-circle avatar avatar-sm pull-up" src='.asset($row->avatar).'>
        <span class="mr-1">'.$row->name.'</span></a></td>        
         <td>'.$row->alias.'</td>
         <td>'.$row->email.'</td>
         <td>'.$row->sex.'</td>
         <td>'.$row->state.", ".$row->country.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }


}
