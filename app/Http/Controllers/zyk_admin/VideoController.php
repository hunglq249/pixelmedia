<?php

namespace App\Http\Controllers\zyk_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Videos\VideoRepository;
use App\Repositories\Videos\VideoLangRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\VideoRequest;

class VideoController extends Controller
{
    protected $videoRepository;
    protected $videoLangRepository;

    public function __construct(
        VideoRepository $videoRepository,
        VideoLangRepository $videoLangRepository
    ){
        $this->videoRepository = $videoRepository;
        $this->videoLangRepository = $videoLangRepository;

        $this->repository = $videoRepository;
        $this->text = 'Video';
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
        $result = $this->videoRepository->searchAndPaginateWithLang($keyword, 10);
        $result->withPath('video?keyword='.$keyword);
        return view('zyk_admin.videos.index', compact('keyword', 'result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = view('zyk_admin.videos.create')->render();
        return response()->json(['html' => $html]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        if($request->path){
            $size = $request->path->getSize();
            if($size > config('constants.VIDEO_UPLOAD_SIZE')){
                Session::flash('error', config('constants.VIDEO_UPLOAD_OVER_SIZE'));
                return redirect()->intended(route('video.create'));
            }
        };

        $data = [
            'created_by' => Auth::user()->email,
            'updated_by' => Auth::user()->email,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'is_deleted' => 0,
            'status' => 0,
        ];
        if($request->path){
            $data['path'] = '/videos/' . $request->file('path')->hashName();
            $request->path->move('storage/app/videos', $request->file('path')->hashName());
        };
        $insertId = $this->videoRepository->insertGetId($data);

        if($insertId){
            $dataVi = [
                'video_id' => $insertId,
                'title' => $request->title_vi,
                'lang' => 'vi'
            ];
            $dataEn = [
                'video_id' => $insertId,
                'title' => $request->title_en,
                'lang' => 'en'
            ];
            $this->videoLangRepository->create($dataVi);
            $this->videoLangRepository->create($dataEn);
            Session::flash('success', sprintf(config('constants.MESSAGE_CREATE_SUCCESS'), 'Video'));
            return redirect()->route('video.index');
        }
        Session::flash('error', sprintf(config('constants.MESSAGE_CREATE_ERROR'), 'Video'));
        return redirect()->route('video.index');
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
        $video = $this->videoRepository->find($id);
        if(!$video){
            Session::flash('error', sprintf(config('constants.MESSAGE_NOT_FOUND'), 'Video'));
            return redirect()->route('video.index');
        }
        $langData = [];
        $ids = [];
        if($video->lang){
            foreach ($video->lang->toArray() as $key => $item){
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

        $html = view('zyk_admin.videos.edit', compact('video', 'langData', 'ids'))->render();
        return response()->json(['html' => $html]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, $id)
    {
        $video = $this->videoRepository->find($id);
        if(!$video){
            Session::flash('error', sprintf(config('constants.MESSAGE_NOT_FOUND'), 'Video'));
            return redirect()->route('video.index');
        }
        $ids = explode(',', $request->id_lang);
        $idVi = $ids[0];
        $idEn = $ids[1];

        if($request->path){
            $size = $request->path->getSize();
            if($size > config('constants.VIDEO_UPLOAD_SIZE')){
                Session::flash('error', config('constants.VIDEO_UPLOAD_OVER_SIZE'));
                return redirect()->intended(route('video.create'));
            }
        };

        $data = [
            'created_by' => Auth::user()->email,
            'updated_by' => Auth::user()->email,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'is_deleted' => 0,
            'status' => 0,
        ];
        if($request->path){
            $data['path'] = '/videos/' . $request->file('path')->hashName();
            $request->path->move('storage/app/videos', $request->file('path')->hashName());
        };
        $update = $this->videoRepository->update($id, $data);

        if($update){
            $dataVi = [
                'video_id' => $id,
                'title' => $request->title_vi,
                'lang' => 'vi'
            ];
            $dataEn = [
                'video_id' => $id,
                'title' => $request->title_en,
                'lang' => 'en'
            ];
            $this->videoLangRepository->update($idVi, $dataVi);
            $this->videoLangRepository->update($idEn, $dataEn);
            Session::flash('success', sprintf(config('constants.MESSAGE_CREATE_SUCCESS'), 'Video'));
            return redirect()->route('video.index');
        }
        Session::flash('error', sprintf(config('constants.MESSAGE_CREATE_ERROR'), 'Video'));
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
