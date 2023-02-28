<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    function index()
    {
        $users = User::get();
        return view('users.index', ['users' => $users]);
    }

    function show($id){
        $user = User::find($id);
        return view('users.show', ['user' => $user]);
       
    }
    function create(){
        return view('users.create');

    }

    function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required'

        ]);
        $newUser = $request->all();
        User::create($newUser);
        return redirect('users')->with('success', "The User Account is Created Successfully");

    }

    function update($id){
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
    }

    function edit($id, Request $request){
        $user = User::find($id);
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required'

        ]);
        $updatedData = $request->except(['_method', '_token']);
        $user->Update($updatedData);
        return redirect('users')->with('success', "The User is Updated Successfully");

    }

    function destroy($id){
        $post = User::find($id)->delete();
        return redirect('users')->with('success', "The User is Deleted Successfully");
    }

    
}
