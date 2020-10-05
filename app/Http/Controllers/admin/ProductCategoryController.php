<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\ProductCategories\ProductCategoryLangRepository;
use App\Repositories\ProductCategories\ProductCategoryRepository;
use Illuminate\Http\Request;
use Auth;
use Session;

class ProductCategoryController extends Controller
{
    protected $productCategoryRepository;
    protected $productCategoryLangRepository;

    public function __construct(
        ProductCategoryRepository $productCategoryRepository,
        ProductCategoryLangRepository $productCategoryLangRepository
    ){
        $this->productCategoryRepository = $productCategoryRepository;
        $this->productCategoryLangRepository = $productCategoryLangRepository;
        $this->repository = $productCategoryRepository;
        $this->text = 'Danh Mục Sản Phẩm';
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
        $categories = $this->productCategoryRepository->searchAndPaginateWithLang($keyword, 10);
        $categories->setPath('danh-muc-san-pham?keyword='.$keyword);
        return view('admin.product_categories.index', compact('categories', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uniqueSlug = $this->createSlug('product_category', $request->slug);
        $data = [
            'slug' => $uniqueSlug,
            'created_by' => Auth::user()->email,
            'updated_by' => Auth::user()->email,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];
        $insertId = $this->productCategoryRepository->insertGetId($data);
        if ($insertId) {
            $title_vi = $request->title_vi;
            $title_en = $request->title_en;
            $dataVi = [
                'product_category_id' => $insertId,
                'title' => $title_vi,
                'lang' => 'vi'
            ];
            $dataEn = [
                'product_category_id' => $insertId,
                'title' => $title_en,
                'lang' => 'en'
            ];
            $this->productCategoryLangRepository->create($dataVi);
            $this->productCategoryLangRepository->create($dataEn);
            Session::flash('success', sprintf(config('constants.MESSAGE_CREATE_SUCCESS'), 'Danh mục sản phẩm'));
            return redirect()->route('danh-muc-san-pham.index');
        }else{
            Session::flash('error', sprintf(config('constants.MESSAGE_CREATE_ERROR'), 'Danh mục sản phẩm'));
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
        $productCategory = $this->productCategoryRepository->find($id);
        if(!$productCategory){
            Session::flash('error', sprintf(config('constants.MESSAGE_NOT_FOUND'), 'Danh mục sản phẩm'));
            return redirect()->route('danh-muc-san-pham.index');
        }
        $title_vi = null;
        $title_en = null;
        foreach ($productCategory->lang as $key => $value){
            if($value['lang'] == 'vi'){
                $title_vi = $value['title'];
            }
            $title_en = $value['title'];
        };
        return view('admin.product_categories.edit', compact('productCategory', 'title_vi', 'title_en'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $uniqueSlug = $this->createSlug('product_category', $request->slug);
        $data = [
            'slug' => $uniqueSlug,
            'updated_by' => Auth::user()->email,
        ];
        $title_vi = $request->title_vi;
        $title_en = $request->title_en;
        $dataVi = [
            'product_category_id' => $id,
            'title' => $title_vi,
            'lang' => 'vi'
        ];
        $dataEn = [
            'product_category_id' => $id,
            'title' => $title_en,
            'lang' => 'en'
        ];
        $langViId = $this->productCategoryLangRepository->findIdByProductCategoryIdAndLang($id, 'vi');
        $langEnId = $this->productCategoryLangRepository->findIdByProductCategoryIdAndLang($id, 'en');
        $this->productCategoryRepository->update($id, $data);
        $this->productCategoryLangRepository->update($langViId, $dataVi);
        $this->productCategoryLangRepository->update($langEnId, $dataEn);
        Session::flash('success', sprintf(config('constants.MESSAGE_UPDATE_SUCCESS'), 'Danh mục sản phẩm'));
        return redirect()->route('danh-muc-san-pham.index');
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
