<?php

namespace App\Http\Controllers;

use App\Models\Common;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Mail;
use Session;

class ContactController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function index(){
		$contactInfo = Common::contactInfo();

		return view('contact', compact('contactInfo'));
    }

    public function sendEmail(Request $request){
        $input = $request->all();
        Mail::send('mailfb', array('name'=>$input["Name"], 'email'=>$input["Email"], 'phone'=>$input['PhoneNumer'], 'content'=>$input["Message"]), function($message) use ($input){
	        $message->to($input["Email"], 'Visitor')->subject('Visitor Feedback!');
	    });
        Session::flash('flash_message', 'Send message successfully!');

        return redirect()->route('contact');
    }
}
