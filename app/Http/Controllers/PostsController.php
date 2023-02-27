<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    function index()
    {
        $posts = Post::get();
        return view('posts.index', ['posts' => $posts]);
    }

    function show($id){
        $post = Post::find($id);
        $user = User::find($post->postCreator);
        return view('posts.show', ['post' => $post, 'user'=>$user]);

    }
    function create(){
        return view('posts.create');

    }

    function store(Request $request){
        $request->validate([
            'title'=>'required',
            'description'=>'required',

        ]);
        $newPost = $request->all();
        $newPost['postCreator']=2;
        Post::create($newPost);
        return redirect('posts')->with('success', "The Post is Created Successfully");

    }

    function update($id){}

    function edit($id){}

    function destroy($id){
        $post = Post::find($id)->delete();
        return redirect('posts')->with('success', "The Post is Deleted Successfully");
    }

    
}
