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

  // public function profile(){
  // 	return view('user.profile');
  // }
  public function logout(){
  	\Auth::logout();
  	return redirect()->back();
  }
  public function update(Request $request, $id){

    $name = $request->get('name');
    $email = $request->get('email');
     $password = \Hash::make($request->get('password'));



     $user = User::find($id);
     $user->name = $name;
     $user->email = $email;
     $user->password = $password;
     $user->update();

     return redirect()->back();

  }
  // public function userupdate(Request $request, $id){

  //   $name = $request->get('name');
  //   $name = $request->get('email');
  //   $name = \Hash::make($request->get('password'));

  //   $user1 = User::find($id);
  //   $user1->name = $name;
  //   // s
  //   $user1->password = $password;

  //   $user1->update();

  //   return redirect()->back();
  // }
}
