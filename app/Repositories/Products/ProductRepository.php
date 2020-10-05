<?php
namespace App\Repositories\Products;

use App\Models\Product;
use App\Repositories\EloquentRepository;

class ProductRepository extends EloquentRepository{
    public function getModel()
    {
        return Product::class;
    }
}
