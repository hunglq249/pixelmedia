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

    public function related($categoryId, $id, $lang){
        return Product::with(
            ['lang' => function ($query) use ($lang){
                $query->where('lang', $lang);
            }]
        )->where('product_category_id', '=', $categoryId)->where('id', '!=', $id)->where('is_deleted', 0)->limit(3)->orderBy('id', 'DESC')->get();
    }
}
