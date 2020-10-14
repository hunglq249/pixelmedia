<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class ArticleLang extends Model
{
    use HasFactory;

    protected $table = 'article_lang';

    protected $fillable = [
        'id',
        'article_id',
        'title',
        'description',
        'content',
        'lang',
    ];

    public function article(){
        return $this->belongsTo(Article::class);
    }
}
