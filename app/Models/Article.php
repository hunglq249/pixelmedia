<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArticleLang;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'category_id',
        'slug',
        'detail',
        'image',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'is_deleted'
    ];

    public function lang(){
        return $this->hasMany(ArticleLang::class);
    }
}
