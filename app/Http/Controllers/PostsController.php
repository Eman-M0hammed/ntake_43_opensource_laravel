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
        // $posts = Post::join('users', 'users.id', '=', 'posts.postCreator')->get(['posts.*', 'users.name']);
        $posts = Post::paginate();
        return view('posts.index', ['posts' => $posts]);
    }

    function show($id){
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
        // $user = User::find($post->postCreator);
        // return view('posts.show', ['post' => $post, 'user'=>$user]);

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
        // default value to post creator because the user doesn't login
        $newPost['postCreator']=2;
        Post::create($newPost);
        return redirect('posts')->with('success', "The Post is Created Successfully");

    }

    function update($id){
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }

    function edit($id, Request $request){
        $post = Post::find($id);
        $request->validate([
            'title'=>'required',
            'description'=>'required',

        ]);
        $updatedPost = $request->except(['_method', '_token']);
        $updatedPost['postCreator']=$post['postCreator'];
        $post->Update($updatedPost);
        return redirect('posts')->with('success', "The Post is Updated Successfully");

    }

    function destroy($id){
        $post = Post::find($id)->delete();
        return redirect('posts')->with('success', "The Post is Deleted Successfully");
    }

    
}
