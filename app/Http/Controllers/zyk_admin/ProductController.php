<?php

namespace App\Http\Controllers\zyk_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ProductCategories\ProductCategoryRepository;
use App\Repositories\Teams\TeamRepository;
use App\Repositories\Products\ProductRepository;
use App\Repositories\Products\ProductLangRepository;
use Auth;
use Session;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    protected $productCategoryRepository;
    protected $teamRepository;
    protected $productRepository;
    protected $productLangRepository;

    public function __construct(
        ProductCategoryRepository $productCategoryRepository,
        TeamRepository $teamRepository,
        ProductRepository $productRepository,
        ProductLangRepository $productLangRepository
    ){
        $this->productCategoryRepository = $productCategoryRepository;
        $this->teamRepository = $teamRepository;
        $this->productRepository = $productRepository;
        $this->productLangRepository = $productLangRepository;
        $this->repository = $productRepository;
        $this->text = 'Sản Phẩm';
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
        $result = $this->productRepository->searchAndPaginateWithLang($keyword, 10);
        $result->setPath('san-pham?keyword='.$keyword);
        return view('zyk_admin.products.index', compact('keyword', 'result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->productCategoryRepository->getAllWithLang();
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
        $teams = $this->teamRepository->getAll();
        $customTeams = [];
        foreach ($teams as $team) {
            $customTeams[$team->id] = $team->name;
        }

        $html = view('zyk_admin.products.create', compact('customCategories', 'customTeams'))->render();
        return response()->json(['html' => $html]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if($request->cover_mask){
            $size = $request->cover_mask->getSize();
            if($size > 1572864){
                Session::flash('error', 'Ảnh không được vựt quá 1.5 Mb!!');
                return redirect()->intended(route('san-pham.create'));
            }
        };
        $imageErrors = [];
        if($files=$request->file('images')){
            foreach($files as $file){
                $size = $file->getSize();
                $name=$file->getClientOriginalName();
                if($size > 1572864){
                    $imageErrors[] = $name;
                }
            }
        }
        if(count($imageErrors) > 0){
            Session::flash('error', 'Ảnh '. implode(', ', $imageErrors) .' vựt quá 1.5 Mb!!');
            return redirect()->intended(route('san-pham.create'));
        }
        $uniqueSlug = $this->createSlug('product_category', $request->slug);
        $data = [
            'product_category_id' => $request->product_category_id,
            'slug' => $uniqueSlug,
            'client' => $request->client,
            'date' => $request->date,
            'team_id' => $request->team_id ? implode(', ', $request->team_id) : null,
            'cover_type' => $request->cover_type,
            'created_by' => Auth::user()->email,
            'updated_by' => Auth::user()->email,
            'is_deleted' => 0,
            'is_top' => $request->is_top,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];
        if($request->cover_mask){
            $data['cover_mask'] = '/products/' . $request->file('cover_mask')->hashName();
            $data['cover_url'] = '/products/' . $request->file('cover_mask')->hashName();
            $request->cover_mask->move('storage/app/products', $request->file('cover_mask')->hashName());
        };
        $images = [];
        if($files = $request->images){
            foreach($files as $file){
                $newImageName= $file->hashName();
                try {
                    $file->move('storage/app/products' ,$newImageName);
                    $images[] = '/products/' . $newImageName;
                }catch (\Exception $exception){
                    return 'Image Helper saveImage ' . $exception->getMessage();
                }

            }
        }
        if(count($images) > 0){
            $data['images'] = implode(',', $images);
        }

        if($request->cover_url){
            $data['cover_url'] = $request->cover_url;
        }
        $insertId = $this->productRepository->insertGetId($data);
        if($insertId){
            $dataVi = [
                'product_id' => $insertId,
                'sub_title' => $request->sub_title_vi,
                'title' => $request->title_vi,
                'description' => $request->description_vi,
                'content' => $request->content_vi,
                'lang' => 'vi'
            ];
            $dataEn = [
                'product_id' => $insertId,
                'sub_title' => $request->sub_title_en,
                'title' => $request->title_en,
                'description' => $request->description_en,
                'content' => $request->content_en,
                'lang' => 'en'
            ];
            $this->productLangRepository->create($dataVi);
            $this->productLangRepository->create($dataEn);
            Session::flash('success', sprintf(config('constants.MESSAGE_CREATE_SUCCESS'), 'Sản phẩm'));
            return redirect()->route('san-pham.index');
        }
        Session::flash('error', sprintf(config('constants.MESSAGE_CREATE_ERROR'), 'Sản phẩm'));
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
        $detail = $this->productRepository->find($id);
        $images = $detail->images ? explode(',', $detail->images) : null;
        $detail->images = $images;
        return view('zyk_admin.products.show', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);
        $categories = $this->productCategoryRepository->getAllWithLang();
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
        $teams = $this->teamRepository->getAll();
        $customTeams = [];
        foreach ($teams as $team) {
            $customTeams[$team->id] = $team->name;
        }
        $product->images = explode(',', $product->images);
        $product->team_id = explode(',', $product->team_id);
        $langData = [];
        $ids = [];
        if($product->lang){
            foreach ($product->lang->toArray() as $key => $item){
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

        $html = view('zyk_admin.products.edit', compact('customCategories', 'customTeams', 'product', 'langData', 'ids'))->render();
        return response()->json(['html' => $html]);
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
        $ids = explode(',', $request->id_lang);
        $idVi = $ids[0];
        $idEn = $ids[1];
        if($request->cover_mask){
            $size = $request->cover_mask->getSize();
            if($size > 1572864){
                Session::flash('error', 'Ảnh không được vựt quá 1.5 Mb!!');
                return redirect()->intended(route('san-pham.create'));
            }
        };
        $imageErrors = [];
        if($files=$request->file('images')){
            foreach($files as $file){
                $size = $file->getSize();
                $name=$file->getClientOriginalName();
                if($size > 1572864){
                    $imageErrors[] = $name;
                }
            }
        }
        if(count($imageErrors) > 0){
            Session::flash('error', 'Ảnh '. implode(', ', $imageErrors) .' vựt quá 1.5 Mb!!');
            return redirect()->intended(route('san-pham.create'));
        }
        $uniqueSlug = $this->createSlug('product_category', $request->slug);
        $data = [
            'product_category_id' => $request->product_category_id,
            'slug' => $uniqueSlug,
            'client' => $request->client,
            'date' => $request->date,
            'team_id' => $request->team_id ? implode(', ', $request->team_id) : null,
            'cover_type' => $request->cover_type,
            'created_by' => Auth::user()->email,
            'updated_by' => Auth::user()->email,
            'is_deleted' => 0,
            'is_top' => $request->is_top,
            'updated_at' => \Carbon\Carbon::now(),
        ];
        if($request->cover_mask){
            $data['cover_mask'] = '/products/' . $request->file('cover_mask')->hashName();
            $data['cover_url'] = '/products/' . $request->file('cover_mask')->hashName();
            $request->cover_mask->move('storage/app/products', $request->file('cover_mask')->hashName());
        };
        $images = [];
        if($files = $request->images){
            foreach($files as $file){
                $newImageName= $file->hashName();
                try {
                    $file->move('storage/app/products' ,$newImageName);
                    $images[] = '/products/' . $newImageName;
                }catch (\Exception $exception){
                    return 'Image Helper saveImage ' . $exception->getMessage();
                }

            }
        }
        if(count($images) > 0){
            $data['images'] = implode(',', $images);
        }

        if($request->cover_url){
            $data['cover_url'] = $request->cover_url;
        }
        $update = $this->productRepository->update($id,$data);
        if($update){
            $dataVi = [
                'product_id' => $id,
                'sub_title' => $request->sub_title_vi,
                'title' => $request->title_vi,
                'description' => $request->description_vi,
                'content' => $request->content_vi,
                'lang' => 'vi'
            ];
            $dataEn = [
                'product_id' => $id,
                'sub_title' => $request->sub_title_en,
                'title' => $request->title_en,
                'description' => $request->description_en,
                'content' => $request->content_en,
                'lang' => 'en'
            ];
            $this->productLangRepository->update($idVi, $dataVi);
            $this->productLangRepository->update($idEn, $dataEn);
            Session::flash('success', sprintf(config('constants.MESSAGE_CREATE_SUCCESS'), 'Sản phẩm'));
            return redirect()->route('san-pham.index');
        }
        Session::flash('error', sprintf(config('constants.MESSAGE_CREATE_ERROR'), 'Sản phẩm'));
        return back();


//        $data = $request->all();
//        $data['team_id'] = implode(',', $data['team_id']);
//        dd($data);
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
