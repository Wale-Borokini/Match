<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function createPost(Request $request)
    {

        $profileImage = $request->file('image');
        $profileImageSaveAsName = time() . Auth::id() . "-blog." . $profileImage->getClientOriginalExtension();
   
        $upload_path = 'blog_images/';
        $profile_image_url = $upload_path . $profileImageSaveAsName;
        $success = $profileImage->move($upload_path, $profileImageSaveAsName);

        $post = new Post;
        $post->title = $request->title;
        $post->post = $request->post;
        $post->author = 'Author';
        $post->image = $profile_image_url;
        $post->save();

        return redirect('/blog')->with('success', 'Post Created');

    }
}
