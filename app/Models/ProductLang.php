<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductLang extends Model
{
    use HasFactory;

    protected $table = 'product_lang';

    protected $fillable = [
        'id',
        'product_id',
        'title',
        'sub_title',
        'description',
        'content',
        'lang',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
