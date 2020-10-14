<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AboutLang;

class About extends Model
{
    use HasFactory;

    protected $table = 'about';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'cover',
        'break',
        'team_id',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'is_deleted'
    ];

    public function lang(){
        return $this->hasMany(AboutLang::class);
    }
}
