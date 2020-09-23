<?php

namespace App\Http\Controllers;

use App\Models\Common;
use App\Models\Career;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CareerController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function index(){
		$navMenu = Common::navMenu();
		$contactInfo = Common::contactInfo();

		$jobs = Career::jobs();

		return view('career', compact('navMenu', 'contactInfo', 'jobs'));
	}

	public function getJobDetail(){
		$jobId = Request()->get('id');

		$job = Career::jobs()->where('Id', $jobId)->first();

		$html = view('career._ajax._job_detail', compact('job'))->render();
		return response()->json(['html' => $html]);
	}
}
