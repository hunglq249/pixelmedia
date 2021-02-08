<?php

namespace App\Http\Controllers;

use App\Models\Common;
use App\Models\Article1;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Repositories\ArticleCategories\ArticleCategoryRepository;
use App\Repositories\Articles\ArticleRepository;
use Session;

class ArticleController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $articleCategoryRepository;
    protected $articleRepository;

    public function __construct(
        ArticleCategoryRepository $articleCategoryRepository,
        ArticleRepository $articleRepository
    )
    {
        $this->articleCategoryRepository = $articleCategoryRepository;
        $this->articleRepository = $articleRepository;
    }

	public function index(){
        $lang = Session::get('website_language', config('app.locale'));

        $articleCategorieArr = [];
        $articleTypes = $this->articleCategoryRepository->getAllByLang($lang);
        foreach ($articleTypes as $key => $value) {
            if(count($value->lang)){
                $articleTypes[$key]['title'] = $value->lang[0]['title'];
                $articleCategorieArr[$value->id] = $value->lang[0]['title'];
            }
        }

        $articles = $this->articleRepository->getAllByLang($lang);
        foreach ($articles as $key => $value) {
            if(count($value->lang)){
                $articles[$key]['title'] = $value->lang[0]['title'];
                $articles[$key]['description'] = $value->lang[0]['description'];
            }
        }

		return view('article', compact('articleTypes', 'articleCategorieArr', 'articles'));
	}

	public function articleByCategory($id=null){
        $lang = Session::get('website_language', config('app.locale'));

        $articleType = $id;
        $articleTypes = $this->articleCategoryRepository->getAllByLang($lang);
        foreach ($articleTypes as $key => $value) {
            if(count($value->lang)){
                $articleTypes[$key]['title'] = $value->lang[0]['title'];
            }
        }
        if(!$id){
            $articles = $this->articleRepository->getAllByLang($lang);
        }else{
            $articles = $this->articleRepository->getAllByCategoryAndLang($id, $lang);
        }

        foreach ($articles as $key => $value) {
            if(count($value->lang)){
                $articles[$key]['title'] = $value->lang[0]['title'];
                $articles[$key]['description'] = $value->lang[0]['description'];
            }
        }

		return view('article.article_by_category', compact('articleTypes', 'articles'));
	}

	public function detail($slug){
        $lang = Session::get('website_language', config('app.locale'));
		$navMenu = Common::navMenu();
		$contactInfo = Common::contactInfo();

        $articleTypes = $this->articleCategoryRepository->getAllByLang($lang);
        $types = [];
        foreach ($articleTypes as $key => $value) {
            if(count($value->lang)){
                $types[$value->id] = $value->lang[0]['title'];
            }
        }
        $article = $this->articleRepository->findBySlugAndLang($slug, $lang);
        if(count($article->lang)){
            $article['title'] = $article->lang[0]['title'];
            $article['description'] = $article->lang[0]['description'];
            $article['content'] = $article->lang[0]['content'];
        }

        $relateds = $this->articleRepository->related($article->category_id, $article->id, $lang);
        foreach($relateds as $key => $related){
            if(count($related->lang)){
                $related['title'] = $related->lang[0]['title'];
            }
        }

		return view('article.detail', compact('article', 'types', 'relateds'));
	}
}
