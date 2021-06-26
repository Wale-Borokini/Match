<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\User;
use App\Models\Message;
use App\Models\Comment;
use App\Models\Post;
use Auth;
use DB;

class PostsController extends Controller
{

    // public function __construct()
    // {
    //    $this->middleware('auth');
    // }

    public function getCreatePostPage()
    {
        $title = 'Create Post';
        return view('adminPages.createBlogPost')->with('title', $title);

    }

    
    public function blogAdminView()
    {
        $title = 'View Posts';
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('adminPages.blogAdminView')->with(compact('title', 'posts'));

    }

    public function viewBlogPage(){
        $title = 'Blog';
        //return view('pages.index', compact('title'));
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('pages.blog')->with(compact('posts', 'title'));
    }

    public function viewBlogDetailsPage($slug){
        $title = 'Blog';
        $post = Post::where('slug', $slug)->firstOrFail();
        // $posts = Post::find($id);
        //return view('pages.index', compact('title'));
        return view('pages.blogDetails')->with(compact('title', 'post'));
    }


    public function createPost(Request $request)
    {

        if($request->hasFile('image')){
            $profileImage = $request->file('image');
            $profileImageSaveAsName = time() . Auth::id() . "-blog." . $profileImage->getClientOriginalExtension();
    
            $upload_path = 'blog_images/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        }

        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->author = 'Author';
        $post->image = $profile_image_url;
        $post->save();

        return redirect()->back()->with('success', 'Post Created');

    }

    public function edit(Post $post)
    {
        // $post = Post::where('slug', $slug);
        // $post = Post::find($slug);
        $title = 'Edit Post';
        return view('adminPages.editPost')->with(compact('title', 'post'));
    }
    
    public function update(Request $request, Post $post)
    {
        // $post = Post::find($slug);
        
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        
        if($request->hasFile('image')){
            $profileImage = $request->file('image');
            $profileImageSaveAsName = time() . Auth::id() . "-blog." . $profileImage->getClientOriginalExtension();
    
            $upload_path = 'blog_images/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        
        }

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('image')){
            $post->image = $profile_image_url;
        }
        $post->save();

        return redirect('/blogAdminView')->with('success', 'Post Updated');

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('success','Post deleted successfully!');
    }


}



