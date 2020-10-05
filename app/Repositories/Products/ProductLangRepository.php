<?php
namespace App\Repositories\Products;

use App\Models\ProductLang;
use App\Repositories\EloquentRepository;

class ProductLangRepository extends EloquentRepository{
    public function getModel()
    {
        return ProductLang::class;
    }

}
