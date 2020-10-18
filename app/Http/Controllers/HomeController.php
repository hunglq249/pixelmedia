<?php

namespace App\Http\Controllers;

use App\Models\Common;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Session;

class HomeController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function countdown(){
		return view('countdown');
	}

	public function home(){
		$products = Common::products();

		return view('home', compact('products'));
    }

    public function changeLanguage($language){
        Session::put('website_language', $language);

        return redirect()->back();
    }
}
