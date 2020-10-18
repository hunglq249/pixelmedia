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
        return Product::where('id', '>', $id)->first();
    }
    public function getPreviousId($id){
        return Product::where('id', '<', $id)->first();
    }
}
