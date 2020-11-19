<?php
namespace App\Repositories\Videos;

use App\Models\VideoLang;
use App\Repositories\EloquentRepository;

class VideoLangRepository extends EloquentRepository{
    public function getModel()
    {
        return VideoLang::class;
    }
}
