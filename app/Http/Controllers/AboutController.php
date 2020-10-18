<?php

namespace App\Http\Controllers;

use App\Models\Common;
use App\Models\About1;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Repositories\Abouts\AboutRepository;
use App\Repositories\Abouts\AboutLangRepository;
use App\Repositories\Teams\TeamRepository;
use Session;

class AboutController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $aboutRepository;
    protected $aboutLangRepository;
    protected $teamRepository;

    public function __construct(
        AboutRepository $aboutRepository,
        AboutLangRepository $aboutLangRepository,
        TeamRepository $teamRepository
    )
    {
        $this->aboutRepository = $aboutRepository;
        $this->aboutLangRepository = $aboutLangRepository;
        $this->teamRepository = $teamRepository;
    }

	public function index(){
        $lang = Session::get('website_language', config('app.locale'));

        $aboutInfo = $this->aboutRepository->firstByLang($lang);
        $aboutInfo->break = unserialize($aboutInfo->break);
        if(count($aboutInfo->lang)){
            $aboutInfo['description'] = $aboutInfo->lang[0]['description'];
            $aboutInfo['content'] = $aboutInfo->lang[0]['content'];
        }

        $staffs = $this->teamRepository->getAll();

		return view('about', compact('aboutInfo', 'staffs'));
	}
}
