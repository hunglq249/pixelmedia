<?php

namespace App\Http\Controllers;

use App\Models\Common;
use App\Models\Article1;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ArticleController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function index(){
		$navMenu = Common::navMenu();
		$contactInfo = Common::contactInfo();

		$articleTypes = Article1::articleType();
		$articles = Article1::article();

		return view('article', compact('navMenu', 'contactInfo', 'articleTypes', 'articles'));
	}

	public function articleByCategory($id){
		$navMenu = Common::navMenu();
		$contactInfo = Common::contactInfo();

		$articleType = $id;
		$articles = Article1::article()->where('CategoryId', $id)->get();

		return view('article_by_category', compact('navMenu', 'contactInfo', 'articleTypes', 'articles'));
	}

	public function detail($slug){
		$navMenu = Common::navMenu();
		$contactInfo = Common::contactInfo();

		$article = Article1::article()->where('Slug', $slug)->first();

		return view('article.detail', compact('navMenu', 'contactInfo', 'article'));
	}
}
