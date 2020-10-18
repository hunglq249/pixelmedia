<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recruitment;

class RecruitmentLang extends Model
{
    use HasFactory;

    protected $table = 'recruitment_lang';

    protected $fillable = [
        'id',
        'recruitment_id',
        'title',
        'description',
        'content',
        'lang',
    ];

    public function recruitment(){
        return $this->belongsTo(Recruitment::class);
    }
}
