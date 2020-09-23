<?php

namespace App\Http\Controllers;

use App\Models\Common;
use App\Models\Showcase;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ShowcaseController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function index(){
		$navMenu = Common::navMenu();
		$contactInfo = Common::contactInfo();

		$productTypes = Showcase::productType();
		$products = Showcase::product();

		return view('showcase', compact('navMenu', 'contactInfo', 'productTypes', 'products'));
	}

	public function detail($slug){
		$navMenu = Common::navMenu();
		$contactInfo = Common::contactInfo();

		$product = Showcase::product()->where('Slug', $slug)->first();

		return view('showcase.detail', compact('navMenu', 'contactInfo', 'product'));
	}
}