<?php
namespace App\Repositories\Abouts;

use App\Models\AboutLang;
use App\Repositories\EloquentRepository;

class AboutLangRepository extends EloquentRepository{
    public function getModel()
    {
        return AboutLang::class;
    }
}
