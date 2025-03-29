<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasicInformation extends Model
{
    //
    protected $table = 'basic_information';
    protected $fillable = [
        'user_id',
        'title',
        'short_describtion',
        'name',
        'portfolioname',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'company',
        'job_title',
        'avatar',
        'cover',
        'bio',
        'skills',
        'interests',
        'education',
        'experience',
        'certifications',
        'languages',
        'references',
        'social_links',
        'custom_fields',
        'meta',
        'is_public',
        'is_searchable',
        'is_verified',
        'is_active',
    ];
    protected $casts = [
        'skills' => 'array',
        'interests' => 'array',
        'education' => 'array',
        'certifications' => 'array',
        'languages' => 'array',
        'references' => 'array',
        'social_links' => 'array',
        'custom_fields' => 'array',
        'meta' => 'array',
        'is_public' => 'boolean',
        'is_searchable' => 'boolean',
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
