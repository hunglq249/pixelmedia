<?php
namespace App\Repositories\RecruitmentBanner;

use App\Models\RecruitmentBanner;
use App\Repositories\EloquentRepository;

class RecruitmentBannerRepository extends EloquentRepository{
    public function getModel()
    {
        return RecruitmentBanner::class;
    }

    public function first(){
        $result = $this->_model->first();

        return $result;
    }

    public function find($id)
    {
        $result = $this->_model->find($id);

        return $result;
    }
}
