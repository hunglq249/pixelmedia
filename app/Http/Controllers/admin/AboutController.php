<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Abouts\AboutRepository;
use App\Repositories\Abouts\AboutLangRepository;
use App\Repositories\Teams\TeamRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    protected $aboutRepository;
    protected $aboutLangRepository;
    protected $teamRepository;

    public function __construct(
        AboutRepository $aboutRepository,
        AboutLangRepository $aboutLangRepository,
        TeamRepository $teamRepository
    ){
        $this->aboutRepository = $aboutRepository;
        $this->aboutLangRepository = $aboutLangRepository;
        $this->teamRepository = $teamRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = $this->aboutRepository->first();
        $detail->break = unserialize($detail->break);
        return view('admin.abouts.index', compact('detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $detail = $this->aboutRepository->find($id);
        if(!$detail){
            Session::flash('error', sprintf(config('constants.MESSAGE_NOT_FOUND'), 'Giới thiệu'));
            return redirect()->route('gioi-thieu.index');
        }
        dd($detail);
        $detail->break = unserialize($detail->break);
        $detail->team_id = explode(',', $detail->team_id);
        $teams = $this->teamRepository->getAll();
        $customTeams = [];
        foreach ($teams as $team) {
            $customTeams[$team->id] = $team->name;
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
        return view('admin.abouts.edit', compact('detail', 'customTeams', 'langData', 'ids' ));
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
        $detail = $this->aboutRepository->find($id);
        if(!$detail){
            Session::flash('error', sprintf(config('constants.MESSAGE_NOT_FOUND'), 'Giới thiệu'));
            return redirect()->route('gioi-thieu.index');
        }
        $ids = explode(',', $request->id_lang);
        $idVi = $ids[0];
        $idEn = $ids[1];

        if($request->cover){
            $size = $request->cover->getSize();
            if($size > 1572864){
                Session::flash('error', 'Ảnh không được vựt quá 1.5 Mb!!');
                return redirect()->intended(route('san-pham.create'));
            }
        };
        $break1Errors = [];
        if($files=$request->file('break1')){
            foreach($files as $file){
                $size = $file->getSize();
                $name=$file->getClientOriginalName();
                if($size > 1572864){
                    $break1Errors[] = $name;
                }
            }
        }
        if(count($break1Errors) > 0){
            Session::flash('error', 'Ảnh '. implode(', ', $break1Errors) .' vựt quá 1.5 Mb!!');
            return redirect()->intended(route('san-pham.create'));
        }

        $break2Errors = [];
        if($files=$request->file('break2')){
            foreach($files as $file){
                $size = $file->getSize();
                $name=$file->getClientOriginalName();
                if($size > 1572864){
                    $break2Errors[] = $name;
                }
            }
        }
        if(count($break2Errors) > 0){
            Session::flash('error', 'Ảnh '. implode(', ', $break2Errors) .' vựt quá 1.5 Mb!!');
            return redirect()->intended(route('san-pham.create'));
        }

        $imageBreak1 = [];
        if($files = $request->break1){
            foreach($files as $file){
                $newBreak1Name= $file->hashName();
                try {
                    $file->move('storage/app/abouts' ,$newBreak1Name);
                    $imageBreak1[] = '/abouts/' . $newBreak1Name;
                }catch (\Exception $exception){
                    return 'Image Helper saveImage ' . $exception->getMessage();
                }

            }
        }
        $imageBreak2 = [];
        if($files = $request->break2){
            foreach($files as $file){
                $newBreak2Name= $file->hashName();
                try {
                    $file->move('storage/app/abouts' ,$newBreak2Name);
                    $imageBreak2[] = '/abouts/' . $newBreak2Name;
                }catch (\Exception $exception){
                    return 'Image Helper saveImage ' . $exception->getMessage();
                }

            }
        }

        $detail->break = unserialize($detail->break);
        if(count($imageBreak1) == 0){
            $imageBreak1 = $detail->break['break1'];
        }
        if(count($imageBreak2) == 0){
            $imageBreak2 = $detail->break['break2'];
        }
        $images = ['break1' => $imageBreak1, 'break2' => $imageBreak2];

        $data = [
            'team_id' => $request->team_id ? implode(', ', $request->team_id) : null,
            'created_by' => Auth::user()->email,
            'updated_by' => Auth::user()->email,
            'is_deleted' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];
        if($request->cover){
            $data['cover'] = '/abouts/' . $request->file('cover')->hashName();
            $request->cover->move('storage/app/abouts', $request->file('cover')->hashName());
        };
        if(count($images) > 0){
            $data['break'] = serialize($images);
        }

        $update = $this->aboutRepository->update($id,$data);
        if($update){
            $dataVi = [
                'about_id ' => $id,
                'description' => $request->description_vi,
                'content' => $request->content_vi,
                'lang' => 'vi'
            ];
            $dataEn = [
                'about_id ' => $id,
                'description' => $request->description_en,
                'content' => $request->content_en,
                'lang' => 'en'
            ];
            $this->aboutLangRepository->update($idVi, $dataVi);
            $this->aboutLangRepository->update($idEn, $dataEn);
            Session::flash('success', sprintf(config('constants.MESSAGE_CREATE_SUCCESS'), 'Giới thiệu'));
            return redirect()->route('gioi-thieu.index');
        }
        Session::flash('error', sprintf(config('constants.MESSAGE_CREATE_ERROR'), 'Giới thiệu'));
        return back();
    }
}
