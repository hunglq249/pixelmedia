<?php
namespace App\Repositories\ProductCategories;

use App\Models\ProductCategory;
use App\Repositories\EloquentRepository;

class ProductCategoryRepository extends EloquentRepository{
    public function getModel()
    {
        return ProductCategory::class;
    }

    public function getAllWithLang()
    {
        return $this->_model->with('lang')->get();
    }


}
