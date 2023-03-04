<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    protected function _registerOrLoginUser($data){
        $user = User::where('email',$data->email)->first();
          if(!$user){
             $user = new User();
             $user->name = $data->name;
             $user->email = $data->email;
             $user->password =  Hash::make(str_random(5));
             $user->save();
          }
        Auth::login($user);
        }

//Google Login
public function redirectToGoogle(){
return Socialite::driver('google')->stateless()->redirect();
}

//Google callback  
public function handleGoogleCallback(){

$user = Socialite::driver('google')->stateless()->user();

  $this->_registerorLoginUser($user);
  return redirect()->route('dashboard');
}

//Facebook Login
public function redirectToFacebook(){
return Socialite::driver('facebook')->stateless()->redirect();
}

//facebook callback  
public function handleFacebookCallback(){

$user = Socialite::driver('facebook')->stateless()->user();

  $this->_registerorLoginUser($user);
  return redirect()->route('dashboard');
}

//Github Login
public function redirectToGithub(){
return Socialite::driver('github')->stateless()->redirect();
}

//github callback  
public function handleGithubCallback(){

$user = Socialite::driver('github')->stateless()->user();

  $this->_registerorLoginUser($user);
  return redirect()->route('dashboard');
}

}