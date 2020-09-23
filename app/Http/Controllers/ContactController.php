<?php

namespace App\Http\Controllers;

use App\Models\Common;
use App\Models\About;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ContactController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function index(){
		$navMenu = Common::navMenu();
		$contactInfo = Common::contactInfo();

		return view('contact', compact('navMenu', 'contactInfo'));
	}
}
