<?php
namespace App\Repositories\Articles;

use App\Models\Article;
use App\Repositories\EloquentRepository;

class ArticleRepository extends EloquentRepository{
    public function getModel()
    {
        return Article::class;
    }
}
