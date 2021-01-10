<?php

namespace App\Http\Controllers\zyk_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\RecruitmentBanner\RecruitmentBannerRepository;
use Session;

class RecruitmentBannerController extends Controller
{

    protected $recruitmentBannerRepository;

    public function __construct(
        RecruitmentBannerRepository $recruitmentBannerRepository
    )
    {
        $this->recruitmentBannerRepository = $recruitmentBannerRepository;
        $this->repository = $recruitmentBannerRepository;
        $this->text = 'Banner Tuyển Dụng';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->recruitmentBannerRepository->first();
        return view('zyk_admin.recruitment_banner.index', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = $this->recruitmentBannerRepository->find($id);
        if(!$detail){
            Session::flash('error', sprintf(config('constants.MESSAGE_NOT_FOUND'), 'Banner tuyển dụng'));
            return redirect()->route('banner-tuyen-dung.index');
        }
        $html = view('zyk_admin.recruitment_banner.edit', compact('detail'))->render();
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
        $detail = $this->recruitmentBannerRepository->find($id);
        if(!$detail){
            Session::flash('error', sprintf(config('constants.MESSAGE_NOT_FOUND'), 'Bài viết tuyển dụng'));
            return redirect()->route('banner-tuyen-dung.index');
        }

        if($request->image){
            $size = $request->image->getSize();
            if($size > config('constants.IMAGE_UPLOAD_SIZE')){
                Session::flash('error', config('constants.IMAGE_UPLOAD_OVER_SIZE'));
                return redirect()->intended(route('tuyen-dung.create'));
            }
            $data = [
                'image' => '/recruitment_banners/' . $request->file('image')->hashName(),
                'updated_at' => \Carbon\Carbon::now(),
            ];
            $request->image->move('storage/app/recruitment_banners', $request->file('image')->hashName());
            $update = $this->recruitmentBannerRepository->update($id, $data);
            if($update){
                Session::flash('success', sprintf(config('constants.MESSAGE_CREATE_SUCCESS'), 'Banner tuyển dụng'));
                return redirect()->route('banner-tuyen-dung.index');
            }
            Session::flash('error', sprintf(config('constants.MESSAGE_CREATE_ERROR'), 'Banner tuyển dụng'));
            return back();
        };
        return redirect()->route('banner-tuyen-dung.index');
    }
}
