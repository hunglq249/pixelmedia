<?php
namespace App\Repositories\Recruitments;

use App\Models\RecruitmentLang;
use App\Repositories\EloquentRepository;

class RecruitmentLangRepository extends EloquentRepository{
    public function getModel()
    {
        return RecruitmentLang::class;
    }
}
