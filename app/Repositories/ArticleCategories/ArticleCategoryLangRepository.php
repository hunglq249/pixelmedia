<?php
namespace App\Repositories\ArticleCategories;

use App\Models\ArticleCategoryLang;
use App\Repositories\EloquentRepository;

class ArticleCategoryLangRepository extends EloquentRepository{
    public function getModel()
    {
        return ArticleCategoryLang::class;
    }

    public function findIdByProductCategoryIdAndLang($articleCategoryId, $lang){
        $result = $this->_model->where(['article_category_id' => $articleCategoryId, 'lang' => $lang])->first();
        if(!$result){
            return -1;
        }
        return $result->id;
    }


}
