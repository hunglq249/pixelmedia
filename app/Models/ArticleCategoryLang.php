<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArticleCategory;

class ArticleCategoryLang extends Model
{
    use HasFactory;

    protected $table = 'article_category_lang';

    protected $fillable = [
        'id',
        'article_category_id',
        'title',
        'lang',
    ];

    public function category(){
        return $this->belongsTo(ArticleCategory::class);
    }
}
