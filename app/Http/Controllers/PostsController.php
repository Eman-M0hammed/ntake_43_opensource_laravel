<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    function getProducts()
    {
        $posts = Post::get();
        return view('posts', ['posts' => $posts]);
    }
}