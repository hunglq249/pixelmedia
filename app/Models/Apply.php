<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;

    protected $table = 'apply';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'recruitment_id',
        'file',
        'name',
        'email',
        'phone',
        'message',
        'status',
        'created_at',
        'updated_at',
        'is_deleted'
    ];
}
