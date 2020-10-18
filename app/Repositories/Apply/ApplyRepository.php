<?php
namespace App\Repositories\Apply;

use App\Models\Apply;
use App\Repositories\EloquentRepository;

class ApplyRepository extends EloquentRepository{
    public function getModel()
    {
        return Apply::class;
    }
}
