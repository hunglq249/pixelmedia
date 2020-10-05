<?php
namespace App\Repositories\Teams;

use App\Models\Team;
use App\Repositories\EloquentRepository;

class TeamRepository extends EloquentRepository{
    public function getModel()
    {
        return Team::class;
    }
}
