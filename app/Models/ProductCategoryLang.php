<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryLang extends Model
{
    use HasFactory;

    protected $table = 'product_category_lang';

    protected $fillable = [
        'id',
        'product_category_id',
        'title',
        'lang',
    ];

    public function category(){
        return $this->belongsTo(ProductCategory::class);
    }
}
