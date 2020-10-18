<?php

namespace App\Http\Controllers\zyk_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Apply\ApplyRepository;

class ApplyController extends Controller
{
    protected $applyRepository;

    public function __construct(
        ApplyRepository $applyRepository
    )
    {
        $this->applyRepository = $applyRepository;
    }

    public function index(Request $request){
        $keyword = '';
        $keyword = $request->keyword;
        $result = $this->applyRepository->searchAndPaginate($keyword, 10);
        $result->setPath('ung-tuyen?keyword='.$keyword);
        return view('zyk_admin.apply.index', compact('keyword', 'result'));
    }

    public function updateStatus($id, $status){
        $data = [
            'status' => $status
        ];
        $update = $this->applyRepository->update($id, $data);
        if($update){
            return response()->json([
                'status' => 200,
                'isExist' => true,
                'message' => sprintf(config('constants.MESSAGE_UPDATE_SUCCESS'), 'Trạng thái')
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'isExist' => false,
                'message' => sprintf(config('constants.MESSAGE_UPDATE_ERROR'), 'Trạng thái')
            ]);
        }
    }
}
