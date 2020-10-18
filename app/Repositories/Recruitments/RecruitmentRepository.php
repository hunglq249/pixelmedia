<?php
namespace App\Repositories\Recruitments;

use App\Models\Recruitment;
use App\Repositories\EloquentRepository;

class RecruitmentRepository extends EloquentRepository{
    public function getModel()
    {
        return Recruitment::class;
    }
}
