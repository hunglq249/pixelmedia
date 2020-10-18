<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RecruitmentLang;

class Recruitment extends Model
{
    use HasFactory;

    protected $table = 'recruitment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'recruitment_id',
        'image',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'is_deleted'
    ];

    public function lang(){
        return $this->hasMany(RecruitmentLang::class);
    }
}
