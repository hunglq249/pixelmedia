<?php

namespace App\Http\Controllers;

use App\Models\Common;
use App\Models\Showcase;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Repositories\Products\ProductRepository;
use App\Repositories\ProductCategories\ProductCategoryRepository;
use App\Repositories\Teams\TeamRepository;

class ShowcaseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $productRepository;
    protected $productCategoryRepository;
    protected $teamRepository;

    public function __construct(
        ProductRepository $productRepository,
        ProductCategoryRepository $productCategoryRepository,
        TeamRepository $teamRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->productCategoryRepository = $productCategoryRepository;
        $this->teamRepository = $teamRepository;
    }

	public function index(){
        $lang = Session::get('website_language', config('app.locale'));

        $products = Showcase::product();

        $productTypes = [];
        $productCategories = $this->productCategoryRepository->getAllByLang($lang);
        foreach ($productCategories as $key => $value) {
            if(count($value->lang)){
                $productTypes[$value->id]['title'] = $value->lang[0]['title'];
                $productTypes[$value->id]['image'] = $value->image;
                $productTypes[$value->id]['id'] = $value->id;
            }
        }

        $products = $this->productRepository->getAllByLang($lang);
        foreach ($products as $key => $value) {
            if(count($value->lang)){
                $products[$key]['title'] = $value->lang[0]['title'];
            }
        }
        // dd($products);

		return view('showcase', compact('productTypes', 'products'));
	}

	public function detail($slug){
        $lang = Session::get('website_language', config('app.locale'));

        $product = Showcase::product()->where('Slug', $slug)->first();

        $teams = $this->teamRepository->getAll();
        $customTeams = [];
        foreach ($teams as $key => $value) {
            $customTeams[$value->id][] = [
                'position' => $value->position,
                'name' => $value->name,
            ];
        }

        $product = $this->productRepository->findBySlugAndLang($slug, $lang);
        if(count($product->lang)){
            $product['title'] = $product->lang[0]['title'];
            $product['description'] = $product->lang[0]['description'];
            $product['content'] = $product->lang[0]['content'];
            $product['images'] = explode(',', $product->images);
            $teamIds = explode(',', str_replace(' ', '', $product->team_id));
            foreach ($teamIds as $tid) {
                $product['teams'] = $customTeams[$tid];
            }
        }
        $previous = $this->productRepository->getPreviousId($product->id);
        $next = $this->productRepository->getNextId($product->id);

		return view('showcase.detail', compact('product', 'previous', 'next'));
	}
}
