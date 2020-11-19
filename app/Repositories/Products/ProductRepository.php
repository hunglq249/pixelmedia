<?php
namespace App\Repositories\Products;

use App\Models\Product;
use App\Repositories\EloquentRepository;

class ProductRepository extends EloquentRepository{
    public function getModel()
    {
        return Product::class;
    }

    public function getNextId($id){
        return Product::where('id', '>', $id)->where('is_deleted', 0)->first();
    }
    public function getPreviousId($id){
        return Product::where('id', '<', $id)->where('is_deleted', 0)->first();
    }
}
