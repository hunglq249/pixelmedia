<?php
namespace App\Repositories\Articles;

use App\Models\ArticleLang;
use App\Repositories\EloquentRepository;

class ArticleLangRepository extends EloquentRepository{
    public function getModel()
    {
        return ArticleLang::class;
    }
}
