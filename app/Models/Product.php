<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductLang;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'product_category_id',
        'slug',
        'client',
        'date',
        'team_id',
        'cover_type',
        'cover_mask',
        'cover_url',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'is_deleted'
    ];



    public function lang(){
        return $this->hasMany(ProductLang::class);
    }
}
