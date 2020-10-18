<?php

namespace App\Http\Controllers\zyk_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Recruitments\RecruitmentRepository;
use App\Repositories\Recruitments\RecruitmentLangRepository;
use Auth;
use Session;

class RecruitmentController extends Controller
{
    protected $recruitmentRepository;
    protected $recruitmentLangRepository;

    public function __construct(
        RecruitmentRepository $recruitmentRepository,
        RecruitmentLangRepository $recruitmentLangRepository
    )
    {
        $this->recruitmentRepository = $recruitmentRepository;
        $this->recruitmentLangRepository = $recruitmentLangRepository;
        $this->repository = $recruitmentRepository;
        $this->text = 'Tuyển Dụng';
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
        $result = $this->recruitmentRepository->searchAndPaginateWithLang($keyword, 10);
        $result->setPath('san-pham?keyword='.$keyword);
        return view('zyk_admin.recruitments.index', compact('keyword', 'result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = view('zyk_admin.recruitments.create')->render();
        return response()->json(['html' => $html]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->image){
            $size = $request->image->getSize();
            if($size > 1572864){
                Session::flash('error', 'Ảnh không được vựt quá 1.5 Mb!!');
                return redirect()->intended(route('thanh-vien.create'));
            }
        };
        $data = [
            'created_by' => Auth::user()->email,
            'updated_by' => Auth::user()->email,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];
        if($request->image){
            $data['image'] = '/recruitments/' . $request->file('image')->hashName();
            $request->image->move('storage/app/recruitments', $request->file('image')->hashName());
        };
        $insertId = $this->recruitmentRepository->insertGetId($data);
        if($insertId){
            $dataVi = [
                'recruitment_id' => $insertId,
                'title' => $request->title_vi,
                'description' => $request->description_vi,
                'content' => $request->content_vi,
                'lang' => 'vi'
            ];
            $dataEn = [
                'recruitment_id' => $insertId,
                'title' => $request->title_en,
                'description' => $request->description_en,
                'content' => $request->content_en,
                'lang' => 'en'
            ];
            $this->recruitmentLangRepository->create($dataVi);
            $this->recruitmentLangRepository->create($dataEn);
            Session::flash('success', sprintf(config('constants.MESSAGE_CREATE_SUCCESS'), 'Bài viết tuyển dụng'));
            return redirect()->route('tuyen-dung.index');
        }
        Session::flash('error', sprintf(config('constants.MESSAGE_CREATE_ERROR'), 'Bài viết tuyển dụng'));
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
        $detail = $this->recruitmentRepository->find($id);
        if(!$detail){
            Session::flash('error', sprintf(config('constants.MESSAGE_NOT_FOUND'), 'Bài viết tuyển dụng'));
            return redirect()->route('tuyen-dung.index');
        }

        $langData = [];
        $ids = [];
        if($detail->lang){
            foreach ($detail->lang->toArray() as $key => $item){
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

        $html = view('zyk_admin.recruitments.edit', compact('detail', 'langData', 'ids'))->render();
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
        $detail = $this->recruitmentRepository->find($id);
        if(!$detail){
            Session::flash('error', sprintf(config('constants.MESSAGE_NOT_FOUND'), 'Bài viết tuyển dụng'));
            return redirect()->route('tuyen-dung.index');
        }

        $ids = explode(',', $request->id_lang);
        $idVi = $ids[0];
        $idEn = $ids[1];

        if($request->image){
            $size = $request->image->getSize();
            if($size > 1572864){
                Session::flash('error', 'Ảnh không được vựt quá 1.5 Mb!!');
                return redirect()->intended(route('tuyen-dung.create'));
            }
        };

        $data = [
            'created_by' => Auth::user()->email,
            'updated_by' => Auth::user()->email,
            'updated_at' => \Carbon\Carbon::now(),
            'is_deleted' => 0
        ];
        if($request->image){
            $data['image'] = '/recruitments/' . $request->file('image')->hashName();
            $request->image->move('storage/app/recruitments', $request->file('image')->hashName());
        };
        $update = $this->recruitmentRepository->update($id, $data);

        if($update){
            $dataVi = [
                'recruitment_id' => $id,
                'title' => $request->title_vi,
                'description' => $request->description_vi,
                'content' => $request->content_vi,
                'lang' => 'vi'
            ];
            $dataEn = [
                'recruitment_id' => $id,
                'title' => $request->title_en,
                'description' => $request->description_en,
                'content' => $request->content_en,
                'lang' => 'en'
            ];
            $this->recruitmentLangRepository->update($idVi, $dataVi);
            $this->recruitmentLangRepository->update($idEn, $dataEn);
            Session::flash('success', sprintf(config('constants.MESSAGE_CREATE_SUCCESS'), 'Bài viết tuyển dụng'));
            return redirect()->route('tuyen-dung.index');
        }
        Session::flash('error', sprintf(config('constants.MESSAGE_CREATE_ERROR'), 'Bài viết tuyển dụng'));
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
