<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\User;
use App\Models\Message;
use App\Models\Comment;
use App\Models\Post;
use DB;
use File;
use Purifier;


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
        //     'body' => 'required',
        //     'avatar' => ['required', 'mimes:jpg']
        // ]);
        
        $user = Auth::user();

        // if($request->hasFile('gallery_images')){
        //     foreach($request->file('gallery_images') as $profileImage)
        //     {
        //         $profileImage = $request->file('gallery_images');
        //         $profileImageSaveAsName = time() . Auth::id() . "-gallery." . $profileImage->getClientOriginalExtension();
        
        //         $upload_path = 'gallery_images/';
        //         $profile_image_url = $upload_path . $profileImageSaveAsName;
        //         $success = $profileImage->move($upload_path, $profileImageSaveAsName);

        //         $user->gallery_images = json_encode($profile_image_url);
        //     }
        // }

        if($request->hasfile('gallery_images'))
         {
            foreach($request->file('gallery_images') as $image)
            {
                $filenameWithExtPr = $image->getClientOriginalName();
                // Get just filename
                $filenamePr = pathinfo($filenameWithExtPr, PATHINFO_FILENAME);
                // Get just ext
                $extensionPr = $image->getClientOriginalExtension();
                // Filename to store
                $fileNameToStorePr= $filenamePr.'_'.time().'.'.$extensionPr;
                // Upload path
                $upload_path = 'gallery_images/';
                // Upload Image
                $path_url = $upload_path . $fileNameToStorePr;

                $success = $image->move($upload_path, $fileNameToStorePr);
                  
                $images_data[] = $path_url;  
            }

            $user->gallery_images = json_encode($images_data);
         }

        
        $user->name = $request->input('name');
        $user->sex = $request->input('sex');
        $user->alias = $request->input('alias');
        $user->visibility = $request->input('visibility');
        $user->age = $request->input('age');
        $user->country = $request->input('country');
        $user->state = $request->input('state');
        $user->bio = Purifier::clean($request->input('bio'));
        $user->work = Purifier::clean($request->input('work'));
        $user->education = Purifier::clean($request->input('education'));
                
        $user->save();

        return redirect('/editProfile')->with('success', 'User Updated');

    }

    public function changeProfile(Request $request, User $user)
    {        
        $this->validate($request, [
            
            'avatar' => ['mimes:jpeg,png,jpg,gif,svg|max:2048']
        ]);

        $user = Auth::user();

        
        

        if($request->hasFile('avatar')){     
            
            $this->deleteOldImage();

            $profileImage = $request->file('avatar');            
            $profileImageSaveAsName = time() . Auth::id() . "-profile." . $profileImage->getClientOriginalExtension();
            
            $upload_path = 'profile_images/';            
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        }
        
        
        $user->avatar = $profile_image_url;
        $user->save();

        

        // return redirect()->back()->with('success', 'Post Created');        

    }

    
    protected function deleteOldImage()
    {
      if (Auth::user()->avatar){
        // unlink(('profile_images/' . Auth::user()->avatar));
        File::delete(Auth::user()->avatar);
        
      }
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
