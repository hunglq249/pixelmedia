<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ArticleCategories\ArticleCategoryRepository;
use App\Repositories\ArticleCategories\ArticleCategoryLangRepository;
use Auth;
use Session;
use App\Http\Requests\ArticleCategoryRequest;

class ArticleCategoryController extends Controller
{
    protected $articleCategoryRepository;
    protected $articleCategoryLangRepository;

    public function __construct(
        ArticleCategoryRepository $articleCategoryRepository,
        ArticleCategoryLangRepository $articleCategoryLangRepository
    )
    {
        $this->articleCategoryRepository = $articleCategoryRepository;
        $this->articleCategoryLangRepository = $articleCategoryLangRepository;
        $this->repository = $articleCategoryRepository;
        $this->text = 'Danh Mục Bài Viết';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = '';
        $keyword = $request->keyword;
        $categories = $this->articleCategoryRepository->searchAndPaginateWithLang($keyword, 10);
        $categories->withPath('danh-muc-bai-viet?keyword='.$keyword);
        return view('admin.article_categories.index', compact('categories', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleCategoryRequest $request)
    {
        $uniqueSlug = $this->createSlug('article_category', $request->slug);
        $data = [
            'slug' => $uniqueSlug,
            'created_by' => Auth::user()->email,
            'updated_by' => Auth::user()->email,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];
        $insertId = $this->articleCategoryRepository->insertGetId($data);
        if ($insertId) {
            $title_vi = $request->title_vi;
            $title_en = $request->title_en;
            $dataVi = [
                'article_category_id' => $insertId,
                'title' => $title_vi,
                'lang' => 'vi'
            ];
            $dataEn = [
                'article_category_id' => $insertId,
                'title' => $title_en,
                'lang' => 'en'
            ];
            $this->articleCategoryLangRepository->create($dataVi);
            $this->articleCategoryLangRepository->create($dataEn);
            Session::flash('success', sprintf(config('constants.MESSAGE_CREATE_SUCCESS'), 'Danh mục bài viết'));
            return redirect()->route('danh-muc-bai-viet.index');
        }else{
            Session::flash('error', sprintf(config('constants.MESSAGE_CREATE_ERROR'), 'Danh mục bài viết'));
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->articleCategoryRepository->find($id);
        if(!$category){
            Session::flash('error', sprintf(config('constants.MESSAGE_NOT_FOUND'), 'Danh mục sản phẩm'));
            return redirect()->route('danh-muc-bai-viet.index');
        }
        $title_vi = null;
        $title_en = null;
        foreach ($category->lang as $key => $value){
            if($value['lang'] == 'vi'){
                $title_vi = $value['title'];
            }
            $title_en = $value['title'];
        };
        return view('admin.article_categories.edit', compact('category', 'title_vi', 'title_en'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleCategoryRequest $request, $id)
    {
        $category = $this->articleCategoryRepository->find($id);
        if(!$category){
            Session::flash('error', sprintf(config('constants.MESSAGE_NOT_FOUND'), 'Danh mục sản phẩm'));
            return redirect()->route('danh-muc-bai-viet.index');
        }
        $uniqueSlug = $this->createSlug('article_category', $request->slug);
        $data = [
            'slug' => $uniqueSlug,
            'updated_by' => Auth::user()->email,
        ];
        $title_vi = $request->title_vi;
        $title_en = $request->title_en;
        $dataVi = [
            'article_category_id' => $id,
            'title' => $title_vi,
            'lang' => 'vi'
        ];
        $dataEn = [
            'article_category_id' => $id,
            'title' => $title_en,
            'lang' => 'en'
        ];
        $langViId = $this->articleCategoryLangRepository->findIdByProductCategoryIdAndLang($id, 'vi');
        $langEnId = $this->articleCategoryLangRepository->findIdByProductCategoryIdAndLang($id, 'en');
        $this->articleCategoryRepository->update($id, $data);
        $this->articleCategoryLangRepository->update($langViId, $dataVi);
        $this->articleCategoryLangRepository->update($langEnId, $dataEn);
        Session::flash('success', sprintf(config('constants.MESSAGE_UPDATE_SUCCESS'), 'Danh mục bài viết'));
        return redirect()->route('danh-muc-bai-viet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
