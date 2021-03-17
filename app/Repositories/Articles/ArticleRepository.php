<?php
namespace App\Repositories\Articles;

use App\Models\Article;
use App\Repositories\EloquentRepository;

class ArticleRepository extends EloquentRepository{
    public function getModel()
    {
        return Article::class;
    }

    public function related($categoryId, $id, $lang){
        return Article::with(
            ['lang' => function ($query) use ($lang){
                $query->where('lang', $lang);
            }]
        )->where('category_id', '=', $categoryId)->where('id', '!=', $id)->where('is_deleted', 0)->limit(6)->orderBy('id', 'DESC')->get();
    }
}
