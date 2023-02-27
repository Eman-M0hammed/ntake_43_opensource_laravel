<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    function getPosts()
    {
        $posts = Post::get();
        return view('posts', ['posts' => $posts]);
    }

    function show($id){
        $post = Post::find($id);
        $user = User::find($post->postCreator);
        $data = $post->concat($user);
        return view('show', ['post' => $data]);

    }

    function update($id){}

    function edit($id){}

    function destroy($id){}

    
}
