<?php
namespace App\Repositories\Abouts;

use App\Models\About;
use App\Repositories\EloquentRepository;

class AboutRepository extends EloquentRepository{
    public function getModel()
    {
        return About::class;
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
