<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Mail;
use Session;
class HomeController extends Controller
{
    //Email page
public function contact()
    {
        return view('pages.contact');
    }
// Email fucntion
public function postcontact(Request $request){
    	$this->validate($request,[
    		'email' => 'required|email',
    		'subject' => 'min:3',
    		'message' => 'min:10']);

    	$data = array(
    		'email' => $request->email,
    		'subject' => $request->subject,
    		'bodyMessage' => $request->message);

    	Mail::send('pages.contact', $data, function($message) use ($data){
    		$message->from($data['email']);
    		$message->to('allahnoorqudosi@gmail.com');
    		$message->subject($data['subject']);
            

    	});
    	Session::flash('success','success send message');
    	return redirect()->back();
    }
   
}
