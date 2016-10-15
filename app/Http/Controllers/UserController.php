<?php

namespace App\Http\Controllers;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class UserController extends Controller
{
  public function signup(){
  	return view('user.signup');
}

  public function postsignup(Request $request){

  	$this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required',
  		]);

  	$user = new User();
  	$user->name = $request->input('name');
  	$user->email = $request->input('email');
  	$user->password = bcrypt($request->input('password'));
  	$user->save();
    \Auth::login('$user');
  	return redirect()->route('profile');

  }
  public function handlelogin(Request $request){
  	$data= $request->only('email','password');
  	if (\Auth::attempt( $data )) {
  		
  		return redirect()->route('profile');
  	
  	}
  	return back()->withInput();
  }

  public function profile(){
  	return view('user.profile');
  }
  public function logout(){
  	\Auth::logout();
  	return redirect()->back();
  }
}
