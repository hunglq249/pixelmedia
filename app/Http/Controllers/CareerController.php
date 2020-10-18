<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Repositories\Recruitments\RecruitmentRepository;
use App\Repositories\Apply\ApplyRepository;
use Illuminate\Http\Request;
use Session;

class CareerController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $recruitmentRepository;
    protected $applyRepository;

    public function __construct(
        RecruitmentRepository $recruitmentRepository,
        ApplyRepository $applyRepository
    )
    {
        $this->recruitmentRepository = $recruitmentRepository;
        $this->applyRepository = $applyRepository;
    }

	public function index(){
        $lang = Session::get('website_language', config('app.locale'));

        $jobs = $this->recruitmentRepository->getAllByLang($lang);
        foreach ($jobs as $key => $value) {
            if(count($value->lang)){
                $jobs[$key]['title'] = $value->lang[0]['title'];
                $jobs[$key]['description'] = $value->lang[0]['description'];
            }
        }

		return view('career', compact('jobs'));
	}

	public function getJobDetail(){
        $jobId = Request()->get('id');
        $lang = Session::get('website_language', config('app.locale'));

        $job = $this->recruitmentRepository->findByIdAndLang($jobId, $lang);
        if(count($job->lang)){
            $job['title'] = $job->lang[0]['title'];
            $job['description'] = $job->lang[0]['description'];
            $job['content'] = $job->lang[0]['content'];
        }

		$html = view('career._ajax._job_detail', compact('job'))->render();
		return response()->json(['html' => $html]);
    }

    public function apply(Request $request){
        if($request->file){
            $size = $request->file->getSize();
            $extension = $request->file('file')->extension();
            if(strtolower($extension) != 'csv'){
                return redirect()->route('career');
            }
            if($size > 10485760){
                Session::flash('error', 'Ảnh không được vựt quá 10 Mb!!');
                return redirect()->intended(route('career.apply'));
            }
        };
        $data = [
            'recruitment_id' => $request->JobId,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->email,
            'message' => $request->message,
            'created_at' => \Carbon\Carbon::now(),
        ];
        if($request->file){
            $data['file'] = '/apply/' . $request->file('file')->hashName();
            $request->file->move('storage/app/apply', $request->file('file')->hashName());
        };
        $this->applyRepository->create($data);
        $this->sendEmail($data);
        return redirect()->route('career');
    }

    protected function sendEmail($input){
        Mail::send('mailfb', array('name'=>$input["name"], 'email'=>$input["email"], 'phone'=>$input['phone'], 'content'=>$input["message"]), function($message) use ($input){
	        $message->to($input["email"], 'Visitor')->subject('Visitor Feedback!');
	    });
    }
}
