<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArticleCategoryLang;

class ArticleCategory extends Model
{
    use HasFactory;

    protected $table = 'article_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'slug',
        'image',
        'created_by',
        'updated_by',
        'is_deleted',
    ];

    public function lang(){
        return $this->hasMany(ArticleCategoryLang::class);
    }
}
