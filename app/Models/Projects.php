<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    //
    protected $table = 'projects';
    
    protected $fillable = [
        'title',
        'user_id',
        'slug',
        'thumbnail',
        'url',
        'short_description',
        'description',
        'is_public',
        'is_searchable',
        'is_active',
    ];
    protected $casts = [
        'is_public' => 'boolean',
        'is_searchable' => 'boolean',
        'is_active' => 'boolean',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
