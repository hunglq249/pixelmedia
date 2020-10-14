<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Articles\ArticleRepository;
use App\Repositories\Articles\ArticleLangRepository;
use App\Repositories\ArticleCategories\ArticleCategoryRepository;
use App\Repositories\ArticleCategories\ArticleCategoryLangRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    protected $articleRepository;
    protected $articleLangRepository;
    protected $articleCategoryRepository;
    protected $articleCategoryLangRepository;

    public function __construct(
        ArticleRepository $articleRepository,
        ArticleLangRepository $articleLangRepository,
        ArticleCategoryRepository $articleCategoryRepository,
        ArticleCategoryLangRepository $articleCategoryLangRepository
    )
    {
        $this->articleRepository = $articleRepository;
        $this->articleLangRepository = $articleLangRepository;
        $this->articleCategoryRepository = $articleCategoryRepository;
        $this->articleCategoryLangRepository = $articleCategoryLangRepository;
        $this->repository = $articleRepository;
        $this->text = 'Bài Viết';
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
        $result = $this->articleRepository->searchAndPaginateWithLang($keyword, 10);
        $result->withPath('bai-viet?keyword='.$keyword);
        return view('admin.articles.index', compact('keyword', 'result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->articleCategoryRepository->getAllWithLang();
        $customCategories = [];
        foreach ($categories as $key => $value){
            $title = '';
            foreach ($value->lang as $item){
                if($title == ''){
                    $title .= $item->title;
                }else{
                    $title .= ' | ' . $item->title;
                }
            }
            $customCategories[$value->id] = $title;
        }
        return view('admin.articles.create', compact('customCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        if($request->image){
            $size = $request->image->getSize();
            if($size > 1572864){
                Session::flash('error', 'Ảnh không được vựt quá 1.5 Mb!!');
                return redirect()->intended(route('bai-viet.create'));
            }
        };

        $uniqueSlug = $this->createSlug('article', $request->slug);
        $data = [
            'category_id' => $request->product_category_id,
            'slug' => $uniqueSlug,
            'detail' => $request->detail,
            'created_by' => Auth::user()->email,
            'updated_by' => Auth::user()->email,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'is_deleted' => 0
        ];
        if($request->image){
            $data['image'] = '/articles/' . $request->file('image')->hashName();
            $request->image->move('storage/app/articles', $request->file('image')->hashName());
        };
        $insertId = $this->articleRepository->insertGetId($data);

        if($insertId){
            $dataVi = [
                'article_id' => $insertId,
                'title' => $request->title_vi,
                'description' => $request->description_vi,
                'content' => $request->content_vi,
                'lang' => 'vi'
            ];
            $dataEn = [
                'article_id' => $insertId,
                'title' => $request->title_en,
                'description' => $request->description_en,
                'content' => $request->content_en,
                'lang' => 'en'
            ];
            $this->articleLangRepository->create($dataVi);
            $this->articleLangRepository->create($dataEn);
            Session::flash('success', sprintf(config('constants.MESSAGE_CREATE_SUCCESS'), 'Bài Viết'));
            return redirect()->route('bai-viet.index');
        }
        Session::flash('error', sprintf(config('constants.MESSAGE_CREATE_ERROR'), 'Bài Viết'));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = $this->articleRepository->find($id);
        return view('admin.articles.show', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = $this->articleRepository->find($id);
        $categories = $this->articleCategoryRepository->getAllWithLang();
        $customCategories = [];
        foreach ($categories as $key => $value){
            $title = '';
            foreach ($value->lang as $item){
                if($title == ''){
                    $title .= $item->title;
                }else{
                    $title .= ' | ' . $item->title;
                }
            }
            $customCategories[$value->id] = $title;
        }
        $langData = [];
        $ids = [];
        if($article->lang){
            foreach ($article->lang->toArray() as $key => $item){
                if($item['lang'] == 'en'){
                    $lang = 'en';
                    $ids['id_en'] = $item['id'];
                }else{
                    $lang = 'vi';
                    $ids['id_vi'] = $item['id'];
                }
                foreach ($item as $k => $value){
                    $langData[$k . '_' . $lang] = $value;
                }
            }
        }
        $ids = implode(',', $ids);
        return view('admin.articles.edit', compact('customCategories', 'article', 'langData', 'ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $ids = explode(',', $request->id_lang);
        $idVi = $ids[0];
        $idEn = $ids[1];

        if($request->image){
            $size = $request->image->getSize();
            if($size > 1572864){
                Session::flash('error', 'Ảnh không được vựt quá 1.5 Mb!!');
                return redirect()->intended(route('bai-viet.create'));
            }
        };

        $uniqueSlug = $this->createSlug('article', $request->slug);
        $data = [
            'category_id' => $request->product_category_id,
            'slug' => $uniqueSlug,
            'detail' => $request->detail,
            'created_by' => Auth::user()->email,
            'updated_by' => Auth::user()->email,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'is_deleted' => 0
        ];
        if($request->image){
            $data['image'] = '/articles/' . $request->file('image')->hashName();
            $request->image->move('storage/app/articles', $request->file('image')->hashName());
        };
        $update = $this->articleRepository->update($id, $data);

        if($update){
            $dataVi = [
                'article_id' => $id,
                'title' => $request->title_vi,
                'description' => $request->description_vi,
                'content' => $request->content_vi,
                'lang' => 'vi'
            ];
            $dataEn = [
                'article_id' => $id,
                'title' => $request->title_en,
                'description' => $request->description_en,
                'content' => $request->content_en,
                'lang' => 'en'
            ];
            $this->articleLangRepository->update($idVi, $dataVi);
            $this->articleLangRepository->update($idEn, $dataEn);
            Session::flash('success', sprintf(config('constants.MESSAGE_CREATE_SUCCESS'), 'Bài Viết'));
            return redirect()->route('bai-viet.index');
        }
        Session::flash('error', sprintf(config('constants.MESSAGE_CREATE_ERROR'), 'Bài Viết'));
        return back();
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
