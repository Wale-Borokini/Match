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


class PagesController extends Controller
{
    public function viewIndexPage(){
        $title = 'Match To Be One!';
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function viewAboutPage(){
        $title = 'About';
        //return view('pages.index', compact('title'));
        return view('pages.about')->with('title', $title);
    }

    
    public function viewCodeOfConductPage(){
        $title = 'Code Of Conduct';
        //return view('pages.index', compact('title'));
        return view('pages.codeOfConduct')->with('title', $title);
    }

    public function viewContactPage(){
        $title = 'Contact';
        //return view('pages.index', compact('title'));
        return view('pages.contact')->with('title', $title);
    }

    public function viewStayingSafePage(){
        $title = 'Staying Safe';
        //return view('pages.index', compact('title'));
        return view('pages.stayingSafe')->with('title', $title);
    }

    public function viewLoginPage(){
        $title = 'Login';
        //return view('pages.index', compact('title'));
        return view('auth.login')->with('title', $title);
    }


    public function viewProfile()
    {
        $title = 'Profile';
        
        return view('pages.viewProfile')->with(compact('title'));

    }

    public function editProfile()
    {
        $title = 'Edit Profile';
        
        return view('pages.editProfile')->with(compact('title'));

    }

    public function update(Request $request, User $user)
    {
        // $this->validate($request, [
        //     'title' => 'required',
        //     'body' => 'required'
        // ]);
        
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->sex = $request->input('sex');
        $user->alias = $request->input('alias');
        $user->visibility = $request->input('visibility');
        $user->age = $request->input('age');
        $user->country = $request->input('country');
        $user->state = $request->input('state');
        
        $user->save();

        return redirect('/editProfile')->with('success', 'User Updated');

    }

    public function changeProfile(Request $request, User $user)
    {        

        $user = Auth::user();
        if($request->hasFile('avatar')){
            $profileImage = $request->file('avatar');
            $profileImageSaveAsName = time() . Auth::id() . "-profile." . $profileImage->getClientOriginalExtension();
    
            $upload_path = 'profile_images/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        }
        $user->avatar = $profile_image_url;
        $user->save();
               

    }

    public function adminDashboard()
    {
        $title = 'Admin Dashboard';
        
        return view('adminPages.adminDashboard')->with(compact('title'));

    }

    public function adminRoles()
    {
        $title = 'Admin Role';
        
        return view('adminPages.roles')->with(compact('title'));

    }


}
