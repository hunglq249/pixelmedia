<?php
namespace App\Repositories\ProductCategories;

use App\Models\ProductCategoryLang;
use App\Repositories\EloquentRepository;

class ProductCategoryLangRepository extends EloquentRepository{
    public function getModel()
    {
        return ProductCategoryLang::class;
    }

    public function findIdByProductCategoryIdAndLang($productCategoryId, $lang){
        $result = $this->_model->where(['product_category_id' => $productCategoryId, 'lang' => $lang])->first();
        if(!$result){
            return -1;
        }
        return $result->id;
    }

}
