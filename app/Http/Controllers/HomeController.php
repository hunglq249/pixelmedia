<?php

namespace App\Http\Controllers;

use App\Models\Common;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Repositories\Products\ProductRepository;
use App\Repositories\ProductCategories\ProductCategoryRepository;
use App\Repositories\Videos\VideoRepository;
use Session;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $productRepository;
    protected $productCategoryRepository;
    protected $videoRepository;

    public function __construct(
        ProductRepository $productRepository,
        ProductCategoryRepository $productCategoryRepository,
        VideoRepository $videoRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->productCategoryRepository = $productCategoryRepository;
        $this->videoRepository = $videoRepository;
    }

	public function countdown(){
		return view('countdown');
	}

	public function home(){
        $lang = Session::get('website_language', config('app.locale'));

        $productTypes = $this->productCategoryRepository->getAllByLang($lang);
        $types = [];
        foreach ($productTypes as $key => $value) {
            if(count($value->lang)){
                $types[$value->id] = $value->lang[0]['title'];
            }
        }

        $videos = $this->videoRepository->getAllByLang($lang);
        foreach ($videos as $key => $value) {
            if(count($value->lang)){
                $videos[$key]['title'] = $value->lang[0]['title'];
            }
        }

        $products = Common::products();
        $products = $this->productRepository->getAllByIsTopAndLang($lang);
        foreach ($products as $key => $value) {
            if(count($value->lang)){
                $products[$key]['title'] = $value->lang[0]['title'];
                $products[$key]['sub_title'] = $value->lang[0]['sub_title'];
            }
        }
		return view('home', compact('products', 'types', 'videos'));
    }

    public function changeLanguage($language){
        Session::put('website_language', $language);

        return redirect()->back();
    }
}
