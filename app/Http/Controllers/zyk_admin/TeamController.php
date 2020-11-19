<?php

namespace App\Http\Controllers\zyk_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Teams\TeamRepository;
use App\Http\Requests\TeamRequest;
use Session;
use Auth;

class TeamController extends Controller
{
    protected $teamRepository;

    public function __construct(
        TeamRepository $teamRepository
    ){
        $this->teamRepository = $teamRepository;
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
        $teams = $this->teamRepository->searchAndPaginate($keyword, 10);
        $teams->withPath('thanh-vien?keyword='.$keyword);
        return view('zyk_admin.teams.index', compact('teams', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = view('zyk_admin.teams.create')->render();
        return response()->json(['html' => $html]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        if($request->image){
            $size = $request->image->getSize();
            if($size > config('constants.IMAGE_UPLOAD_SIZE')){
                Session::flash('error', config('constants.IMAGE_UPLOAD_OVER_SIZE'));
                return redirect()->intended(route('thanh-vien.create'));
            }
        };
        $data = [
            'name' => $request->name,
            'position' => $request->position,
            'created_by' => Auth::user()->email,
            'updated_by' => Auth::user()->email,
        ];
        if($request->image){
            $data['image'] = '/teams/' . $request->file('image')->hashName();
            $request->image->move('storage/app/teams', $request->file('image')->hashName());
        };
        $this->teamRepository->create($data);
        Session::flash('success', sprintf(config('constants.MESSAGE_CREATE_SUCCESS'), 'Thành viên'));
        return redirect()->route('thanh-vien.index');
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
        $team = $this->teamRepository->findWithoutRelationships($id);

        $html = view('zyk_admin.teams.edit', compact('team'))->render();
        return response()->json(['html' => $html]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, $id)
    {
        if($request->image){
            $size = $request->image->getSize();
            if($size > config('constants.IMAGE_UPLOAD_SIZE')){
                Session::flash('error', config('constants.IMAGE_UPLOAD_OVER_SIZE'));
                return redirect()->intended(route('thanh-vien.create'));
            }
        };
        $data = [
            'name' => $request->name,
            'position' => $request->position,
            'created_by' => Auth::user()->email,
            'updated_by' => Auth::user()->email,
        ];
        if($request->image){
            $data['image'] = '/teams/' . $request->file('image')->hashName();
            $request->image->move('storage/app/teams', $request->file('image')->hashName());
        };
        $this->teamRepository->update($id, $data);
        Session::flash('success', sprintf(config('constants.MESSAGE_UPDATE_SUCCESS'), 'Thành viên'));
        return redirect()->route('thanh-vien.index');
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
