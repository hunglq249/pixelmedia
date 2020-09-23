<?php

namespace App\Http\Controllers;

use App\Models\Common;
use App\Models\About;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class AboutController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function index(){
		$navMenu = Common::navMenu();
		$contactInfo = Common::contactInfo();

		$aboutInfo = About::aboutInfo();
		$staffs = About::staff();

		return view('about', compact('navMenu', 'contactInfo', 'aboutInfo', 'staffs'));
	}
}
