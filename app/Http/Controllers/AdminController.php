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
        
        return view('adminPages.adminDashboard')->with(compact('title'));

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


}
