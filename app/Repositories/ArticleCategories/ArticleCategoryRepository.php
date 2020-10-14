<?php
namespace App\Repositories\ArticleCategories;

use App\Models\ArticleCategory;
use App\Repositories\EloquentRepository;

class ArticleCategoryRepository extends EloquentRepository{
    public function getModel()
    {
        return ArticleCategory::class;
    }

    public function getAllWithLang()
    {
        return $this->_model->with('lang')->get();
    }


}
