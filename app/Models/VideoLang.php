<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Video;

class VideoLang extends Model
{
    use HasFactory;

    protected $table = 'video_lang';

    protected $fillable = [
        'id',
        'video_id',
        'title',
        'lang',
    ];

    public function video(){
        return $this->belongsTo(Video::class);
    }
}
