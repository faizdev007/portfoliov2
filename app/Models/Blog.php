<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $table = 'blogs';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'tags',
        'image',
    ];
    protected $casts = [
        'tags' => 'array',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
