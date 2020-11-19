<?php
namespace App\Repositories\Videos;

use App\Models\Video;
use App\Repositories\EloquentRepository;

class VideoRepository extends EloquentRepository{
    public function getModel()
    {
        return Video::class;
    }

    public function first(){
        $result = $this->_model->with('lang')->first();

        return $result;
    }

    public function firstByLang($lang){
        return $this->_model::with(
            ['lang' => function ($query) use ($lang){
                $query->where('lang', $lang);
            }]
        )->where('is_deleted', 0)->first();
    }
}
