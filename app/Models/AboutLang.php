<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\About;

class AboutLang extends Model
{
    use HasFactory;

    protected $table = 'about_lang';

    protected $fillable = [
        'id',
        'about_id',
        'description',
        'content',
        'lang',
    ];

    public function about(){
        return $this->belongsTo(About::class);
    }
}
