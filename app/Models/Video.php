<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VideoLang;

class Video extends Model
{
    use HasFactory;

    protected $table = 'video';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'path',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'is_deleted'
    ];

    public function lang(){
        return $this->hasMany(VideoLang::class);
    }
}
