<?php

namespace App\Http\Controllers;

use App\Models\Common;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function countdown(){
		return view('countdown');
	}

	public function home(){
		$navMenu = Common::navMenu();
		$products = Common::products();
		$contactInfo = Common::contactInfo();

		return view('home', compact('navMenu', 'products', 'contactInfo'));
	}
}
